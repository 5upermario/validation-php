<?php

declare(strict_types=1);

namespace Tests\Validation;

use Validation\EqualityValidator;
use Validation\NotEmptyValidator;
use Validation\Validation;
use Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
	public function testValidValidationRules(): void
	{
		// setup
		$validation = (new Validation)
			->add(new NotEmptyValidator('test', 'test'))
			->add(new EqualityValidator('t', 't', 'test2'));

		// run
		$result = $validation->validate();

		// assert
		$this->assertTrue($result);
	}

	public function testOnlyOneValidationRuleIsValid(): void
	{
		// setup
		$this->expectException(ValidationException::class);
		$this->expectExceptionMessage('["test","test2"]');

		$validation = (new Validation)
			->add(new NotEmptyValidator('', 'test'))
			->add(new EqualityValidator('t', 't2', 'test2'))
			->add(new EqualityValidator('t', 't', 'test3'));

		// run
		$validation->validate();
	}
}
