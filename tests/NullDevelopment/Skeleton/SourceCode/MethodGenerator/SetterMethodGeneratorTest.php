<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\Skeleton\SourceCode\Method\SetterMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\SetterMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\MethodGenerator\SetterMethodGenerator
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
        $result   = $this->sut->generateAsString($method);

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
