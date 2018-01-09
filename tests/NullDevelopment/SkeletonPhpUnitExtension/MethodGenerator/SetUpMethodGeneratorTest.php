<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use NullDevelopment\Skeleton\ExampleMaker\DefinitionExampleFactory;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use NullDevelopment\SkeletonPhpUnitExtension\Method\SetUpMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\SetUpMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\SetUpMethodGenerator
 * @group  unit
 */
class SetUpMethodGeneratorTest extends TestCase
{
    use AssertOutputTrait;

    /** @var ExampleMaker */
    private $exampleMaker;

    /** @var SetUpMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker(new ReflectionFactory(), new DefinitionExampleFactory());
        $this->sut          = new SetUpMethodGenerator($this->exampleMaker);
    }

    /** @dataProvider provideMethods */
    public function testSupports(SetUpMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(SetUpMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $className = Fixtures::userEntity();
        $firstName = Fixtures::firstNameProperty();

        $name = Fixtures::nameProperty();

        return [
            [new SetUpMethod($className, []), 'setup.empty.output'],
            [new SetUpMethod($className, [$firstName]), 'setup.firstName.output'],
            [new SetUpMethod($className, [$name]), 'setup.name.output'],
            [new SetUpMethod($className, [$name, $firstName]), 'setup.name+firstName.output'],
        ];
    }
}
