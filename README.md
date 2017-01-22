# Dibi class reflection extension for PHPStan

[![Build Status](https://travis-ci.org/phpstan/phpstan-dibi.svg)](https://travis-ci.org/phpstan/phpstan-dibi)
[![Latest Stable Version](https://poser.pugx.org/phpstan/phpstan-dibi/v/stable)](https://packagist.org/packages/phpstan/phpstan-dibi)
[![License](https://poser.pugx.org/phpstan/phpstan-dibi/license)](https://packagist.org/packages/phpstan/phpstan-dibi)

* [PHPStan](https://github.com/phpstan/phpstan)
* [Dibi](https://dibiphp.com/)

This extension defines dynamic methods on `Dibi\Fluent` instance. They are called to build an SQL query dynamically.

## Usage

To use this extension, require it in [Composer](https://getcomposer.org/):

```
composer require --dev phpstan/phpstan-dibi
```

And include extension.neon in your project's PHPStan config:

```
includes:
	- vendor/phpstan/phpstan-dibi/extension.neon
```
