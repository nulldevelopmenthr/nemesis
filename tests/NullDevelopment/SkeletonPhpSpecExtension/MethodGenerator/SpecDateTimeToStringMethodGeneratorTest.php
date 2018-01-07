<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeToStringMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecDateTimeToStringMethodGenerator
 * @group  unit
 */
class SpecDateTimeToStringMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var SpecDateTimeToStringMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeToStringMethodGenerator(new ExampleMaker(new ReflectionFactory()));
    }

    /** @dataProvider provideMethods */
    public function testSupports(SpecDateTimeToStringMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(SpecDateTimeToStringMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        return [
            [new SpecDateTimeToStringMethod(), 'dateTime.it_is_castable_to_string.output'],
        ];
    }
}
