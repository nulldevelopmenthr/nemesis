<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use Nette\PhpGenerator\ClassType;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\DefinitionExampleFactory;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDeserializeMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestDeserializeMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestDeserializeMethodGenerator
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
        $this->exampleMaker = new ExampleMaker(new ReflectionFactory(), new DefinitionExampleFactory());
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
        $result   = $this->sut->generateAsString(new ClassType('zzzz'), $method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $className = ClassName::create('MyVendor\\User');
        $firstName = Fixtures::firstNameProperty();

        return [
            [new TestDeserializeMethod($className, [$firstName]), 'testDeserialize.User.output'],
        ];
    }
}
