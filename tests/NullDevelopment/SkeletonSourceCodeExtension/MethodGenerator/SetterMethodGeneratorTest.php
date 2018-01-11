<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\ClassType;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\SetterMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\SetterMethodGenerator
 * @group  unit
 */
class SetterMethodGeneratorTest extends TestCase
{
    use AssertOutputTrait;

    /** @var SetterMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new SetterMethodGenerator();
    }

    /** @dataProvider provideMethods */
    public function testSupports(SetterMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(SetterMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString(new ClassType('zzzz'), $method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new SetterMethod('setFirstName', $firstName), 'setFirstName.output'],
        ];
    }
}
