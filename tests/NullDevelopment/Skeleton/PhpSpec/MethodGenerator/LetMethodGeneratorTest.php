<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\LetMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodGenerator\LetMethodGenerator
 * @group  unit
 */
class LetMethodGeneratorTest extends TestCase
{
    /** @var ExampleMaker */
    private $exampleMaker;
    /** @var LetMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker();
        $this->sut          = new LetMethodGenerator($this->exampleMaker);
    }

    /** @dataProvider provideMethods */
    public function testSupports(LetMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(LetMethod $method, string $fileName)
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
        $name      = Fixtures::nameProperty();

        return [
            [new LetMethod([]), 'let.empty.output'],
            [new LetMethod([$firstName]), '__construct.firstName.output'],
            [new LetMethod([$name]), '__construct.name.output'],
            [new LetMethod([$name, $firstName]), '__construct.name+firstName.output'],
        ];
    }
}
