---
layout: default
title: Examples
nav_order: 3
permalink: /examples
---

# Examples
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

The following examples are equivalent, each having its caveats.

## Example with inheritance

```php
<?php

declare(strict_type=1);

namespace NorseBlue\HandyProperties\Examples;

use NorseBlue\HandyProperties\HandyObject;

/**
 * @property int $x;
 * @property int $y;
 * @property-read array $position;
 */
class Coordinate extends HandyObject
{
    private $x;
    private $y;

    public function __construct(int $x = 0, int $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    protected function accessorX(): int
    {
        return $this->x;
    }
    
    protected function accessorY(): int
    {
        return $this->y;
    }
    
    protected function mutatorX(int $value): void
    {
        $this->x = $value;
    }

    protected function mutatorY(int $value): void
    {
        $this->y = $value;
    }
    
    protected function accessorPosition(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
        ]; 
    }
}
```

## Example with composition

```php
<?php

declare(strict_type=1);

namespace NorseBlue\HandyProperties\Examples;

use NorseBlue\HandyProperties\Traits\HasPropertyAccessors;
use NorseBlue\HandyProperties\Traits\HasPropertyMutators;

/**
 * @property int $x;
 * @property int $y;
 * @property-read array $position;
 */
class Coordinate
{
    use HasPropertyAccessors;
    use HasPropertyMutators;

    private $x;
    private $y;

    public function __construct(int $x = 0, int $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    private function accessorX(): int
    {
        return $this->x;
    }
    
    private function accessorY(): int
    {
        return $this->y;
    }
    
    private function mutatorX(int $value): void
    {
        $this->x = $value;
    }

    private function mutatorY(int $value): void
    {
        $this->y = $value;
    }
    
    private function accessorPosition(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
        ]; 
    }
}
```
