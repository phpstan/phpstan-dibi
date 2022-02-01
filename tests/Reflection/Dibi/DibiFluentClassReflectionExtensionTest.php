<?php declare(strict_types = 1);

namespace PHPStan\Reflection\Dibi;

use Dibi\Fluent;
use PHPStan\Broker\Broker;
use PHPStan\Reflection\ParametersAcceptorSelector;
use PHPStan\Testing\PHPStanTestCase;
use PHPStan\Type\VerbosityLevel;
use stdClass;

class DibiFluentClassReflectionExtensionTest extends PHPStanTestCase
{

	/** @var Broker */
	private $broker;

	/** @var DibiFluentClassReflectionExtension */
	private $extension;

	protected function setUp(): void
	{
		$this->broker = $this->createBroker();
		$this->extension = new DibiFluentClassReflectionExtension();
	}

	/**
	 * @return array<array{class-string, bool}>
	 */
	public function dataHasMethod(): array
	{
		return [
			[
				Fluent::class,
				true,
			],
			[
				stdClass::class,
				false,
			],
		];
	}

	/**
	 * @dataProvider dataHasMethod
	 */
	public function testHasMethod(string $className, bool $result): void
	{
		$classReflection = $this->broker->getClass($className);
		self::assertSame($result, $this->extension->hasMethod($classReflection, 'select'));
	}

	public function testGetMethod(): void
	{
		$classReflection = $this->broker->getClass(Fluent::class);
		$methodReflection = $this->extension->getMethod($classReflection, 'select');
		$parametersAcceptor = ParametersAcceptorSelector::selectSingle($methodReflection->getVariants());
		self::assertSame('select', $methodReflection->getName());
		self::assertSame($classReflection, $methodReflection->getDeclaringClass());
		self::assertFalse($methodReflection->isStatic());
		self::assertEmpty($parametersAcceptor->getParameters());
		self::assertTrue($parametersAcceptor->isVariadic());
		self::assertFalse($methodReflection->isPrivate());
		self::assertTrue($methodReflection->isPublic());
		self::assertSame(Fluent::class, $parametersAcceptor->getReturnType()->describe(VerbosityLevel::value()));
	}

}
