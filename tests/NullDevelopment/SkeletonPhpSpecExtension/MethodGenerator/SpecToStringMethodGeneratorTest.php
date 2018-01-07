<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator;

use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecToStringMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecToStringMethodGenerator
 * @group  unit
 */
class SpecToStringMethodGeneratorTest extends TestCase
{
    use AssertOutputTrait;

    /** @var ExampleMaker */
    private $exampleMaker;

    /** @var SpecToStringMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker(new ReflectionFactory());
        $this->sut          = new SpecToStringMethodGenerator($this->exampleMaker);
    }

    /** @dataProvider provideMethods */
    public function testSupports(SpecToStringMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(SpecToStringMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new SpecToStringMethod($firstName), 'it_is_castable_to_string.output'],
        ];
    }
}
