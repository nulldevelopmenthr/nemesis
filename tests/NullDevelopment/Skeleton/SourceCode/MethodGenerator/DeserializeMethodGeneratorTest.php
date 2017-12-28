<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\DeserializeMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\MethodGenerator\DeserializeMethodGenerator
 * @group  unit
 */
class DeserializeMethodGeneratorTest extends TestCase
{
    /** @var DeserializeMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new DeserializeMethodGenerator();
    }

    /** @dataProvider provideMethods */
    public function testSupports(DeserializeMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(DeserializeMethod $method, string $fileName)
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
        $className = Fixtures::userEntity();
        $firstName = Fixtures::firstNameProperty();
        $name      = Fixtures::nameProperty();

        return [
            [new DeserializeMethod($className, [$firstName]), 'deserialize.first_name.output'],
            [new DeserializeMethod($className, [$name]), 'deserialize.string.output'],
        ];
    }
}
