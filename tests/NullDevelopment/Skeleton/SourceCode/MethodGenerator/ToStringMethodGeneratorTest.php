<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator\ToStringMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\MethodGenerator\ToStringMethodGenerator
 * @group  unit
 */
class ToStringMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ToStringMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->sut = new ToStringMethodGenerator();
    }

    /** @dataProvider provideMethods */
    public function testSupports(ToStringMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(ToStringMethod $method, string $fileName)
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
            [new ToStringMethod($firstName), 'toString.firstName.output'],
        ];
    }
}
