<?php

declare(strict_types=1);

namespace Validation;

interface Validator
{
	public function validate(): bool;
	/** @return String[] */
	public function errors(): array;
}
