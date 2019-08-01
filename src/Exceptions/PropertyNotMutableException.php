<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties\Exceptions;

/**
 * Exception thrown when a trying to mutate a property that is not mutable.
 */
final class PropertyNotMutableException extends PropertyBaseException
{
}
