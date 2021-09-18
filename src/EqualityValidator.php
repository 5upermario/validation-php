<?php

declare(strict_types=1);

namespace Validation;

class EqualityValidator implements Validator
{
	/** @var mixed $value1 */
	private $value1;
	/** @var mixed $value2 */
	private $value2;
	private string $element;

	/**
	 * @param mixed $value1
	 * @param mixed $value2
	 * @param string $element
	 */
	public function __construct($value1, $value2, string $element)
	{
		$this->value1  = $value1;
		$this->value2  = $value2;
		$this->element = $element;
	}

	public function validate(): bool
	{
		return $this->value1 === $this->value2;
	}

	/** {@inheritdoc} */
	public function errors(): array
	{
		return [$this->element];
	}
}
