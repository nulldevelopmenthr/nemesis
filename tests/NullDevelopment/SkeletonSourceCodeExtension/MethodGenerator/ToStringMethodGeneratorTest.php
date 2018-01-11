<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Nette\PhpGenerator\ClassType;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ToStringMethod;
use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\ToStringMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\ToStringMethodGenerator
 * @group  unit
 */
class ToStringMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

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
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString(new ClassType('zzzz'), $method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        $firstName = Fixtures::firstNameProperty();

        return [
            [new ToStringMethod($firstName), 'toString.firstName.output'],
        ];
    }
}
