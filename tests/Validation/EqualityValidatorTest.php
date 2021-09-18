<?php

declare(strict_types=1);

namespace Tests\Validation;

use Validation\EqualityValidator;
use PHPUnit\Framework\TestCase;

class EqualityValidatorTest extends TestCase
{
	public function testValuesAreEqual(): void
	{
		// setup
		$validator = new EqualityValidator('asdf', 'asdf', 'test');

		// run
		$result = $validator->validate();

		// assert
		$this->assertTrue($result);
	}

	public function testValuesAreNotEqual(): void
	{
		// setup
		$validator = new EqualityValidator('asdf', 'asdf1', 'test');

		// run
		$result = $validator->validate();

		// assert
		$this->assertFalse($result);
		$this->assertEquals(['test'], $validator->errors());
	}
}
