<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDeserializeMethod;
use NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestDeserializeMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestDeserializeMethodGenerator
 * @group  unit
 */
class TestDeserializeMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;
    /** @var MockInterface|ExampleMaker */
    private $exampleMaker;
    /** @var TestDeserializeMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker();
        $this->sut          = new TestDeserializeMethodGenerator($this->exampleMaker);
    }

    /** @dataProvider provideMethods */
    public function testSupports(TestDeserializeMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(TestDeserializeMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $className = ClassName::create('MyVendor\\User');
        $firstName = Fixtures::firstNameProperty();

        return [
            [new TestDeserializeMethod($className, [$firstName]), 'it_can_be_deserialized.output'],
        ];
    }
}
