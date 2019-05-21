# Dibi class reflection extension for PHPStan

[![Build Status](https://travis-ci.org/phpstan/phpstan-dibi.svg)](https://travis-ci.org/phpstan/phpstan-dibi)
[![Latest Stable Version](https://poser.pugx.org/phpstan/phpstan-dibi/v/stable)](https://packagist.org/packages/phpstan/phpstan-dibi)
[![License](https://poser.pugx.org/phpstan/phpstan-dibi/license)](https://packagist.org/packages/phpstan/phpstan-dibi)

* [PHPStan](https://github.com/phpstan/phpstan)
* [Dibi](https://dibiphp.com/)

This extension defines dynamic methods on `Dibi\Fluent` instance. They are called to build an SQL query dynamically.

## Installation

To use this extension, require it in [Composer](https://getcomposer.org/):

```
composer require --dev phpstan/phpstan-dibi
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set!

<details>
  <summary>Manual installation</summary>

If you don't want to use `phpstan/extension-installer`, include extension.neon in your project's PHPStan config:

```
includes:
    - vendor/phpstan/phpstan-dibi/extension.neon
```
</details>
