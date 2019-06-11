<?php

declare(strict_types=1);

namespace NorseBlue\HandyProperties;

use NorseBlue\HandyProperties\Traits\HasPropertyAccessors;
use NorseBlue\HandyProperties\Traits\HasPropertyMutators;

abstract class HandyObject
{
    use HasPropertyAccessors;
    use HasPropertyMutators;
}
