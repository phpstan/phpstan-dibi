# Dibi class reflection extension for PHPStan

[![Build](https://github.com/phpstan/phpstan-dibi/workflows/Build/badge.svg)](https://github.com/phpstan/phpstan-dibi/actions)
[![Latest Stable Version](https://poser.pugx.org/phpstan/phpstan-dibi/v/stable)](https://packagist.org/packages/phpstan/phpstan-dibi)
[![License](https://poser.pugx.org/phpstan/phpstan-dibi/license)](https://packagist.org/packages/phpstan/phpstan-dibi)

* [PHPStan](https://phpstan.org/)
* [Dibi](https://dibi.nette.org/)

This extension provides the following features:

* Defines dynamic methods on `Dibi\Fluent` instances. They are called to build an SQL query dynamically. Each dynamic method accepts variadic arguments and returns `Dibi\Fluent` for method chaining.
* Registers `Dibi\Row` as a universal object crate, allowing dynamic property access without errors.

## Installation

To use this extension, require it in [Composer](https://getcomposer.org/):

```shell
composer require --dev phpstan/phpstan-dibi
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set!

<details>
  <summary>Manual installation</summary>

If you don't want to use `phpstan/extension-installer`, include extension.neon in your project's PHPStan config:

```neon
includes:
    - vendor/phpstan/phpstan-dibi/extension.neon
```
</details>
