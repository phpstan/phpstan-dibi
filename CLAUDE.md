# CLAUDE.md

This is the `phpstan/phpstan-dibi` repository — a PHPStan extension for the [Dibi](https://dibi.nette.org/) database library.

## Project Goal

This extension teaches PHPStan about dynamic methods on `Dibi\Fluent`. Dibi's fluent query builder uses `__call()` to handle SQL clause methods (like `->select()`, `->where()`, `->orderBy()`, etc.) dynamically. Without this extension, PHPStan would report errors for every such method call. The extension tells PHPStan that any method called on `Dibi\Fluent` is valid, accepts variadic arguments, and returns `Dibi\Fluent` (for chaining).

The extension also registers `Dibi\Row` as a universal object crate (dynamic property access without errors).

## Repository Structure

```
src/
  Reflection/Dibi/
    DibiFluentClassReflectionExtension.php   # MethodsClassReflectionExtension implementation
    DibiFluentMethodReflection.php           # MethodReflection for dynamic Dibi\Fluent methods
tests/
  Reflection/Dibi/
    DibiFluentClassReflectionExtensionTest.php  # Unit tests
  bootstrap.php
extension.neon      # PHPStan extension config (registered service + parameters)
phpstan.neon        # PHPStan config for analysing this project itself
phpunit.xml         # PHPUnit configuration
composer.json       # Composer package definition
Makefile            # Build commands
```

## PHP Version Requirement

This project supports **PHP 7.4+**. The composer.json platform is set to `7.4.6`. Do not use PHP 8.0+ syntax (named arguments, union types in declarations, match expressions, constructor promotion, etc.) in the source code.

## Dependencies

- **phpstan/phpstan**: `^2.0` (required)
- **dibi/dibi**: conflicts with `<3.0`, dev dependency on `~4.0`

## Development Commands

All commands are defined in the `Makefile`:

- `make check` — runs all checks (lint, cs, tests, phpstan)
- `make tests` — runs PHPUnit tests
- `make lint` — runs php-parallel-lint on `src/` and `tests/`
- `make cs` — runs PHP_CodeSniffer with phpstan/build-cs coding standard
- `make cs-fix` — auto-fixes coding standard violations
- `make cs-install` — clones and installs the phpstan/build-cs coding standard (2.x branch)
- `make phpstan` — runs PHPStan at level 8 on `src/` and `tests/`

## Coding Standard

This project uses [phpstan/build-cs](https://github.com/phpstan/build-cs) (2.x branch) for coding standards enforcement via PHP_CodeSniffer. To set it up locally, run `make cs-install` before `make cs`.

## Testing

Tests use PHPUnit 9.6 with the `PHPStan\Testing\PHPStanTestCase` base class. Test files are in `tests/` and follow the same namespace structure as `src/`. Test classes must end with `Test.php`.

## CI Pipeline

The GitHub Actions workflow (`.github/workflows/build.yml`) runs on the `2.0.x` branch and pull requests:

- **Lint**: PHP 7.4, 8.0, 8.1, 8.2, 8.3, 8.4
- **Coding Standard**: PHP 8.2
- **Tests**: PHP 7.4–8.4, both lowest and highest dependency versions
- **PHPStan**: PHP 7.4–8.4, both lowest and highest dependency versions

## How the Extension Works

1. `extension.neon` registers `DibiFluentClassReflectionExtension` as a `phpstan.broker.methodsClassReflectionExtension` service.
2. `DibiFluentClassReflectionExtension::hasMethod()` returns `true` for any method on `Dibi\Fluent`.
3. `DibiFluentClassReflectionExtension::getMethod()` returns a `DibiFluentMethodReflection` that describes the method as public, non-static, variadic, and returning `Dibi\Fluent`.
4. `Dibi\Row` is registered as a universal object crate in `extension.neon` parameters.

## Branch

The main development branch is `2.0.x`.
