<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Exceptions;

use RuntimeException;
use Throwable;

/**
 * Base exception class for property related exceptions.
 */
abstract class PropertyBaseException extends RuntimeException
{
    /** @var string The property that was not found. */
    protected string $property;

    /**
     * Create a new instance.
     */
    public function __construct(string $property = '', string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->property = $property;
    }

    /**
     * Get the property value.
     */
    public function getProperty(): string
    {
        return $this->property;
    }
}
