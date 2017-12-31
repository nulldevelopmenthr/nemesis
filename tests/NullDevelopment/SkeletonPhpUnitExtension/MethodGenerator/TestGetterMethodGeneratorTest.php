<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestGetterMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestGetterMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestGetterMethodGenerator
 * @group  unit
 */
class TestGetterMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var ExampleMaker */
    private $exampleMaker;

    /** @var TestGetterMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker();
        $this->sut          = new TestGetterMethodGenerator($this->exampleMaker);
    }

    /** @dataProvider provideMethods */
    public function testSupports(TestGetterMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(TestGetterMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new TestGetterMethod('testGetFirstName', 'getFirstName', $firstName), 'testGet.FirstName.output'],
        ];
    }
}
