<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\InitializableMethodGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodGenerator\InitializableMethodGenerator
 * @group  unit
 */
class InitializableMethodGeneratorTest extends TestCase
{
    /** @var InitializableMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new InitializableMethodGenerator();
    }

    /** @dataProvider provideMethods */
    public function testSupports(InitializableMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(InitializableMethod $method, string $fileName)
    {
        $fileName = __DIR__.'/output/'.$fileName;
        $expected = @file_get_contents($fileName);

        $result = $this->sut->generateAsString($method);

        if (true === empty($expected)) {
            file_put_contents($fileName, $result);
            self::markTestSkipped('Generating output for '.$fileName);
        } else {
            self::assertEquals($expected, $result);
        }
    }

    public function provideMethods(): array
    {
        $className = ClassName::create('MyVendor\\User\\UserFirstName');

        $parentName    = ClassName::create('MyVendor\\User\\Name');
        $interfaceName = InterfaceName::create('MyVendor\\SomeInterface');

        return [
            [new InitializableMethod($className, null, []), 'initializable.empty.output'],
            [new InitializableMethod($className, $parentName, []), 'initializable.parent.output'],
            [new InitializableMethod($className, null, [$interfaceName]), 'initializable.interface.output'],
        ];
    }
}
