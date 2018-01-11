<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Nette\PhpGenerator\ClassType;
use NullDevelopment\Skeleton\ExampleMaker\DefinitionExampleFactory;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeCreateFromFormatMethod;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestDateTimeCreateFromFormatMethodGenerator;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\AssertOutputTrait;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestDateTimeCreateFromFormatMethodGenerator
 * @group  unit
 */
class TestDateTimeCreateFromFormatMethodGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var ExampleMaker */
    private $exampleMaker;

    /** @var TestDateTimeCreateFromFormatMethodGenerator */
    private $sut;

    public function setUp()
    {
        $this->exampleMaker = new ExampleMaker(new ReflectionFactory(), new DefinitionExampleFactory());
        $this->sut          = new TestDateTimeCreateFromFormatMethodGenerator($this->exampleMaker);
    }

    /** @dataProvider provideMethods */
    public function testSupports(TestDateTimeCreateFromFormatMethod $method)
    {
        self::assertTrue($this->sut->supports($method));
    }

    /** @dataProvider provideMethods */
    public function testGenerateAsString(TestDateTimeCreateFromFormatMethod $method, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString(new ClassType('zzzz'), $method);

        $this->assertOutputContentMatches($filePath, $result);
    }

    public function provideMethods(): array
    {
        return [
            [new TestDateTimeCreateFromFormatMethod(), 'dateTime.testCreateFromFormat.output'],
        ];
    }
}
