<?php

declare(strict_types=1);

namespace Validation;

class Validation implements Validator
{
	/** @var Validator[] $validators */
	private array $validators;
	/** @var String[] $errorMessages */
	private array $errorMessages;

	public function __construct()
	{
		$this->validators    = [];
		$this->errorMessages = [];
	}

	public function add(Validator $validator): self
	{
		array_push($this->validators, $validator);

		return $this;
	}

	public function validate(): bool
	{
		$result = true;

		foreach ($this->validators as $validator) {
			if (!$validator->validate()) {
				$result       = false;
				$this->errorMessages = array_merge($this->errorMessages, $validator->errors());
			}
		}

		if (!$result) {
			throw new ValidationException($this->errors());
		}

		return $result;
	}

	/** {@inheritdoc} */
	public function errors(): array
	{
		return $this->errorMessages;
	}
}
