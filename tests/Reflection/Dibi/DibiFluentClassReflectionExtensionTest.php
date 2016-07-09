<?php declare(strict_types = 1);

namespace PHPStan\Reflection\Dibi;

use PHPStan\Reflection\ClassReflection;

class DibiFluentClassReflectionExtensionTest extends \PHPUnit_Framework_TestCase
{

	/** @var \PHPStan\Reflection\Dibi\DibiFluentClassReflectionExtension */
	private $extension;

	protected function setUp()
	{
		$this->extension = new DibiFluentClassReflectionExtension();
	}

	public function dataHasMethod(): array
	{
		return [
			[
				\Dibi\Fluent::class,
				true,
			],
			[
				\stdClass::class,
				false,
			],
		];
	}

	/**
	 * @dataProvider dataHasMethod
	 * @param string $className
	 * @param bool $result
	 */
	public function testHasMethod(string $className, bool $result)
	{
		$classReflection = $this->createMock(ClassReflection::class);
		$classReflection->method('getName')->will($this->returnValue($className));
		$this->assertSame($result, $this->extension->hasMethod($classReflection, 'select'));
	}

}
