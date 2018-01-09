<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ExampleMaker\DefinitionExampleFactory;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeCreateFromFormatMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeCreateFromFormatMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeCreateFromFormatMethodGenerator
 * @group  unit
 */
class SpecDateTimeCreateFromFormatMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var SpecDateTimeCreateFromFormatMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeCreateFromFormatMethodGenerator(new ExampleMaker(new ReflectionFactory(), new DefinitionExampleFactory()));
    }

    /** @dataProvider provideMethods */
    public function testSupports(SpecDateTimeCreateFromFormatMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(SpecDateTimeCreateFromFormatMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        return [
            [new SpecDateTimeCreateFromFormatMethod(), 'dateTime.createFromFormat.output'],
        ];
    }
}
