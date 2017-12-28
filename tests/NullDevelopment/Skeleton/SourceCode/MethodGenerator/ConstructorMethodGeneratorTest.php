<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\ConstructorMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\MethodGenerator\ConstructorMethodGenerator
 * @group  unit
 */
class ConstructorMethodGeneratorTest extends TestCase
{
    /** @var ConstructorMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new ConstructorMethodGenerator();
    }

    /** @dataProvider provideMethods */
    public function testSupports(ConstructorMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(ConstructorMethod $method, string $fileName)
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
        $firstName = Fixtures::firstNameProperty();

        return [
            [new ConstructorMethod([]), '__construct.empty.output'],
            [new ConstructorMethod([$firstName]), '__construct.firstName.output'],
        ];
    }
}
