---
layout: default
title: Usage
nav_order: 2
permalink: /usage
---

# Usage
{: .no_toc }

## Table of contents
{: .no_toc .text-delta }

1. TOC
{:toc}

---

There are different ways of using this package which will be outlined further down. Choose whatever suits your needs better.

## Using Inheritance

The most simple way to use the package is by extending the HandyObject class:

```php
use NorseBlue\HandyProperties\HandyObject;

class MyObject extends HandyObject
{
}
```

[See complete example]({{ site.baseurl }}{% link sections/examples.md %}#example-with-inheritance)

## Using Composition

If you prefer composition over inheritance, you can use the provided traits instead:

```php
use NorseBlue\HandyProperties\Traits\HasPropertyAccessors;
use NorseBlue\HandyProperties\Traits\HasPropertyMutators;

class MyObject
{
    use HasPropertyAccessors;
    use HasPropertyMutators;
}
```

[See complete example]({{ site.baseurl }}{% link sections/examples.md %}#example-with-composition)

## Defining Accessors

Accessors are ways to retrieve values from your objects: `$my_object->value`.

To define an accessor for your object you have to define a function with a name that follows the established convention:

```php
[final] <visibility> function accessor<PropertyName>(): <return_type> { ... }
```

- The method can have the `final` modifier applied to it.
- The method can have any visibility given to it (`private`, `protected` or `public`). When using inheritance, a `private` method won't be accessible to the parent class, so use `protected` instead.
- The accessor method name must be prefixed with the word `accessor`.
- The last part of the method name defines the property name. The property can be accessed through both the camel case or the snake case name (e.g. `myProperty`or `my_property`). _It is encouraged to stick with just one style throughout your code._
- You can (and should) specify the return type of the accessor.
- You are encouraged to use _docblocks_ to define your object's accessors for your IDE auto-completion feature (using `@property-read` if they aren't also mutable or `@property` if they are).

## Defining Mutators

Mutators are ways to modify values within your objects: `$my_object->value = 'new value'`.

To define a mutator for your object you have to define a function with a name that follows the established convention:

```php
[final] <visibility> function mutator<PropertyName>(): <return_type> { ... }
```

- The method can have the `final` modifier applied to it.
- The method can have any visibility given to it (`private`, `protected` or `public`). When using inheritance, a `private` method won't be accessible to the parent class, so use `protected` instead.
- The mutator method name must be prefixed with the word `mutator`.
- The last part of the method name defines the property name. The property can be accessed through both the camel case or the snake case name (e.g. `myProperty`or `my_property`). _It is encouraged to stick with just one style throughout your code._
- The return type will never bee returned when using the property syntax (e.g. `$object->myProperty = 'value'`) but you are able to define a return type other than `void` if you call the method directly.
- You are encouraged to use _docblocks_ to define your object's mutators for your IDE auto-completion feature (using `@property-write` if they aren't also accessible or `@property` if they are).
