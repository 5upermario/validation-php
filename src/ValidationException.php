<?php

declare(strict_types=1);

namespace Validation;

use Exception;
use Throwable;

class ValidationException extends Exception
{
	/** @var array<string> $messages */
	private array $messages;

	/**
	 * @param String[] $messages
	 * @param int $code
	 * @param null|Throwable $previous
	 */
	public function __construct(array $messages, $code = 0, ?Throwable $previous = null)
	{
		$message = json_encode($messages);

		if (($jsonError = json_last_error()) !== JSON_ERROR_NONE || $message === false) {
			$message = 'JSON error encoding $messages: ' . $jsonError;
		}

		parent::__construct($message, $code, $previous);

		$this->messages = $messages;
	}

	/** @return String[] */
	public function getMessages(): array
	{
		return $this->messages;
	}
}
