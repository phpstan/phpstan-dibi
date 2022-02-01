<?php declare(strict_types = 1);

namespace PHPStan\Reflection\Dibi;

use PHPStan\Reflection\ClassMemberReflection;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\FunctionVariant;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Reflection\ParametersAcceptor;
use PHPStan\TrinaryLogic;
use PHPStan\Type\Generic\TemplateTypeMap;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;

class DibiFluentMethodReflection implements MethodReflection
{

	/** @var string */
	private $name;

	/** @var ClassReflection */
	private $dibiFluent;

	public function __construct(string $name, ClassReflection $dibiFluent)
	{
		$this->name = $name;
		$this->dibiFluent = $dibiFluent;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getDeclaringClass(): ClassReflection
	{
		return $this->dibiFluent;
	}

	public function getPrototype(): ClassMemberReflection
	{
		return $this;
	}

	public function isStatic(): bool
	{
		return false;
	}

	public function isPrivate(): bool
	{
		return false;
	}

	public function isPublic(): bool
	{
		return true;
	}

	/**
	 * @return ParametersAcceptor[]
	 */
	public function getVariants(): array
	{
		return [
			new FunctionVariant(
				TemplateTypeMap::createEmpty(),
				TemplateTypeMap::createEmpty(),
				[],
				true,
				new ObjectType('Dibi\Fluent')
			),
		];
	}

	public function getDocComment(): ?string
	{
		return null;
	}

	public function isDeprecated(): TrinaryLogic
	{
		return TrinaryLogic::createNo();
	}

	public function getDeprecatedDescription(): ?string
	{
		return null;
	}

	public function isFinal(): TrinaryLogic
	{
		return TrinaryLogic::createNo();
	}

	public function isInternal(): TrinaryLogic
	{
		return TrinaryLogic::createNo();
	}

	public function getThrowType(): ?Type
	{
		return null;
	}

	public function hasSideEffects(): TrinaryLogic
	{
		return TrinaryLogic::createYes();
	}

}
