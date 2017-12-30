<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\SerializeMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\MethodGenerator\SerializeMethodGenerator
 * @group  unit
 */
class SerializeMethodGeneratorTest extends TestCase
{
    use AssertOutputTrait;

    /** @var SerializeMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SerializeMethodGenerator();
    }

    /** @dataProvider provideMethods */
    public function testSupports(SerializeMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(SerializeMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $className = Fixtures::userEntity();
        $firstName = Fixtures::firstNameProperty();
        $name      = Fixtures::nameProperty();

        return [
            [new SerializeMethod($className, [$firstName]), 'serialize.first_name.output'],
            [new SerializeMethod($className, [$name]), 'serialize.string.output'],
        ];
    }
}
