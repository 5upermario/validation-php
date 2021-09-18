<?php

declare(strict_types=1);

namespace Tests\Validation;

use Validation\NotEmptyValidator;
use PHPUnit\Framework\TestCase;

class NotEmptyValidatorTest extends TestCase
{
	public function testValueIsNotEmpty(): void
	{
		// setup
		$validator = new NotEmptyValidator('test', 'test');

		// run
		$result = $validator->validate();

		// assert
		$this->assertTrue($result);
	}

	public function testValueIsEmptyString(): void
	{
		// setup
		$validator = new NotEmptyValidator('', 'test');

		// run
		$result = $validator->validate();

		// assert
		$this->assertFalse($result);
		$this->assertEquals(['test'], $validator->errors());
	}

	public function testValueIsNull(): void
	{
		// setup
		$validator = new NotEmptyValidator(null, 'test');

		// run
		$result = $validator->validate();

		// assert
		$this->assertFalse($result);
		$this->assertEquals(['test'], $validator->errors());
	}

	public function testValueIsZero(): void
	{
		// setup
		$validator = new NotEmptyValidator(0, 'test');

		// run
		$result = $validator->validate();

		// assert
		$this->assertFalse($result);
		$this->assertEquals(['test'], $validator->errors());
	}
}
