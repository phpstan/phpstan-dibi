# Dibi class reflection extension for PHPStan

* [PHPStan](https://github.com/phpstan/phpstan)
* [Dibi](https://dibiphp.com/)

This extension defines dynamic methods on `Dibi\Fluent` instance. They are called to build an SQL query dynamically.

## Usage

To use this extension, require it in [Composer](https://getcomposer.org/):

```
composer require phpstan/phpstan-dibi
```

And include extension.neon in your project's PHPStan config:

```
includes:
	- vendor/phpstan/phpstan-dibi/extension.neon
```
