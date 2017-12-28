<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\GetterSpecMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodGenerator\GetterSpecMethodGenerator
 * @group  unit
 */
class GetterSpecMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ExampleMaker */
    private $exampleMaker;
    /** @var GetterSpecMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker();
        $this->sut          = new GetterSpecMethodGenerator($this->exampleMaker);
    }

    /** @dataProvider provideMethods */
    public function testSupports(GetterSpecMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(GetterSpecMethod $method, string $fileName)
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
            [new GetterSpecMethod('it_exposes_first_name', 'getFirstName', $firstName), 'it_exposes_first_name.output'],
        ];
    }
}
