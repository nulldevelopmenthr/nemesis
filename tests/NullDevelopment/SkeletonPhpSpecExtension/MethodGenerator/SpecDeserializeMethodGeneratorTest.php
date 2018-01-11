<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use Nette\PhpGenerator\ClassType;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\DefinitionExampleFactory;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDeserializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDeserializeMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDeserializeMethodGenerator
 * @group  unit
 */
class SpecDeserializeMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var MockInterface|ExampleMaker */
    private $exampleMaker;

    /** @var SpecDeserializeMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker(new ReflectionFactory(), new DefinitionExampleFactory());
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
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString(new ClassType('zzzz'), $method);

        $this->assertOutputContentMatches($filePath, $result);
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
