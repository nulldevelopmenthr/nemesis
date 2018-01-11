<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Nette\PhpGenerator\ClassType;
use NullDevelopment\Skeleton\ExampleMaker\DefinitionExampleFactory;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeSerializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeSerializeMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeSerializeMethodGenerator
 * @group  unit
 */
class SpecDateTimeSerializeMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var SpecDateTimeSerializeMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeSerializeMethodGenerator(
            new ExampleMaker(new ReflectionFactory(), new DefinitionExampleFactory())
        );
    }

    /** @dataProvider provideMethods */
    public function testSupports(SpecDateTimeSerializeMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(SpecDateTimeSerializeMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString(new ClassType('zzzz'), $method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        return [
            [new SpecDateTimeSerializeMethod(), 'dateTime.it_can_be_serialized.output'],
        ];
    }
}
