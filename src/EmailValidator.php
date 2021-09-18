<?php

declare(strict_types=1);

namespace Validation;

class EmailValidator implements Validator
{
	private ?string $email;

	public function __construct(?string $email)
	{
		$this->email = $email;
	}

	public function validate(): bool
	{
		return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
	}

	/** {@inheritdoc} */
	public function errors(): array
	{
		return ['email'];
	}
}
