<?php declare(strict_types = 1);

namespace PHPStan\Reflection\Dibi;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\MethodsClassReflectionExtension;

class DibiFluentClassReflectionExtension implements MethodsClassReflectionExtension
{

	public function hasMethod(ClassReflection $classReflection, string $methodName): bool
	{
		return $classReflection->getName() === 'Dibi\Fluent';
	}

	public function getMethod(ClassReflection $classReflection, string $methodName): MethodReflection
	{
		return new DibiFluentMethodReflection($methodName, $classReflection);
	}

}
