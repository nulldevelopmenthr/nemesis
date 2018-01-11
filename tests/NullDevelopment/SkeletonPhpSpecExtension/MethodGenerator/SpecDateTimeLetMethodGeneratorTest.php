<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Nette\PhpGenerator\ClassType;
use NullDevelopment\Skeleton\ExampleMaker\DefinitionExampleFactory;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeLetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeLetMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeLetMethodGenerator
 * @group  unit
 */
class SpecDateTimeLetMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var SpecDateTimeLetMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeLetMethodGenerator(
            new ExampleMaker(new ReflectionFactory(), new DefinitionExampleFactory())
        );
    }

    /** @dataProvider provideMethods */
    public function testSupports(SpecDateTimeLetMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(SpecDateTimeLetMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString(new ClassType('zzzz'), $method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        return [
            [new SpecDateTimeLetMethod(), 'dateTime.let.output'],
        ];
    }
}
