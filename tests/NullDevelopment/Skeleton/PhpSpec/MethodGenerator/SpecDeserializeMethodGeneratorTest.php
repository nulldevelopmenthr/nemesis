<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDeserializeMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\SpecDeserializeMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodGenerator\SpecDeserializeMethodGenerator
 * @group  unit
 */
class SpecDeserializeMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ExampleMaker */
    private $exampleMaker;
    /** @var SpecDeserializeMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker();
        $this->sut          = new SpecDeserializeMethodGenerator($this->exampleMaker);
    }

    /** @dataProvider provideMethods */
    public function testSupports(SpecDeserializeMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(SpecDeserializeMethod $method, string $fileName)
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
        $className = ClassName::create('MyVendor\\User');
        $firstName = Fixtures::firstNameProperty();

        return [
            [new SpecDeserializeMethod($className, [$firstName]), 'it_can_be_deserialized.output'],
        ];
    }
}
