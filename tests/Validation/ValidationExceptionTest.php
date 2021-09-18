<?php

declare(strict_types=1);

namespace Tests\Validation;

use Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class ValidationExceptionTest extends TestCase
{
	public function testExecuteExceptionWithInvalidArray(): void
	{
		// setup
		$ex = new ValidationException([NAN]);

		// run
		$result = $ex->getMessage();

		// assert
		$this->assertEquals('JSON error encoding $messages: ' . JSON_ERROR_INF_OR_NAN, $result);
	}

	public function testMessagesConvertedToString(): void
	{
		// setup
		$ex = new ValidationException(['mail']);

		// run
		$result = $ex->getMessage();

		// assert
		$this->assertEquals('["mail"]', $result);
	}

	public function testGetMessages(): void
	{
		// setup
		$ex = new ValidationException(['mail']);

		// run
		$result = $ex->getMessages();

		// assert
		$this->assertEquals(['mail'], $result);
	}
}
