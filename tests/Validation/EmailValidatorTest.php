<?php

declare(strict_types=1);

namespace Tests\Validation;

use Validation\EmailValidator;
use PHPUnit\Framework\TestCase;

class EmailValidatorTest extends TestCase
{
	public function testIsEmail(): void
	{
		// setup
		$validator = new EmailValidator('test@test.hu');

		// run
		$result = $validator->validate();

		// assert
		$this->assertTrue($result);
	}

	public function testEmailNotContainsAtSign(): void
	{
		// setup
		$validator = new EmailValidator('testtest.hu');

		// run
		$result = $validator->validate();

		// assert
		$this->assertFalse($result);
		$this->assertEquals(['email'], $validator->errors());
	}

	public function testEmailNotContainsDomain(): void
	{
		// setup
		$validator = new EmailValidator('test@testhu');

		// run
		$result = $validator->validate();

		// assert
		$this->assertFalse($result);
		$this->assertEquals(['email'], $validator->errors());
	}
}
