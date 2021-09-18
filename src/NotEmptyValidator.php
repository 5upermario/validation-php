<?php

declare(strict_types=1);

namespace Validation;

class NotEmptyValidator implements Validator
{
	/** @var mixed $value */
	private $value;
	private string $element;

	/**
	 * @param mixed $value
	 * @param string $element
	 */
	public function __construct($value, string $element)
	{
		$this->value   = $value;
		$this->element = $element;
	}

	public function validate(): bool
	{
		return !empty($this->value);
	}

	/** {@inheritdoc} */
	public function errors(): array
	{
		return [$this->element];
	}
}
