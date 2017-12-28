<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpUnit\Method\TestGetterMethod;
use NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestGetterMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestGetterMethodGenerator
 * @group  unit
 */
class TestGetterMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
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
        $fileName = __DIR__.'/output/'.$fileName;
        $expected = @file_get_contents($fileName);

        $result = $this->sut->generateAsString($method);

        if (true === empty($expected)) {
            file_put_contents($fileName, $result);
            self::markTestSkipped('Generating output for '.$fileName);
        } else {
            self::assertEquals($expected, $result);
        }
    }

    public function provideMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new TestGetterMethod('it_exposes_first_name', 'getFirstName', $firstName), 'it_exposes_first_name.output'],
        ];
    }
}
