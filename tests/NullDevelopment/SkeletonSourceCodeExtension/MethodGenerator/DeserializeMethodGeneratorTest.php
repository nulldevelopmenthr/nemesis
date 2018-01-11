<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\ClassType;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\DeserializeMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\DeserializeMethodGenerator
 * @group  unit
 */
class DeserializeMethodGeneratorTest extends TestCase
{
    use AssertOutputTrait;

    /** @var DeserializeMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new DeserializeMethodGenerator();
    }

    /** @dataProvider provideMethods */
    public function testSupports(DeserializeMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(DeserializeMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString(new ClassType('zzzz'), $method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $className = Fixtures::userEntity();
        $firstName = Fixtures::firstNameProperty();
        $name      = Fixtures::nameProperty();

        return [
            [new DeserializeMethod($className, [$firstName]), 'deserialize.first_name.output'],
            [new DeserializeMethod($className, [$name]), 'deserialize.string.output'],
        ];
    }
}
