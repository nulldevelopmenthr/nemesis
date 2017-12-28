<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\GetterMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\MethodGenerator\GetterMethodGenerator
 * @group  unit
 */
class GetterMethodGeneratorTest extends TestCase
{
    use AssertOutputTrait;
    /** @var GetterMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new GetterMethodGenerator();
    }

    /** @dataProvider provideMethods */
    public function testSupports(GetterMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(GetterMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new GetterMethod('getFirstName', $firstName), 'getFirstName.output'],
        ];
    }
}
