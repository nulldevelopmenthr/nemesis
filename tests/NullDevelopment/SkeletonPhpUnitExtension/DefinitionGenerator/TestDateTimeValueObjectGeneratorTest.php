<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\TestDateTimeValueObject;
use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestDateTimeValueObjectGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeCreateFromFormatMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeDeserializeMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeSerializeMethod;
use NullDevelopment\SkeletonPhpUnitExtension\Method\TestDateTimeToStringMethod;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestDateTimeValueObjectGenerator
 * @group  integration
 */
class TestDateTimeValueObjectGeneratorTest extends SfTestCase
{
    use AssertOutputTrait;

    /** @var TestDateTimeValueObjectGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestDateTimeValueObjectGenerator::class);
    }

    /** @dataProvider provideTestDateTimeValueObject */
    public function testSupports(TestDateTimeValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideTestDateTimeValueObject */
    public function testGenerateAsString(TestDateTimeValueObject $definition, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideTestDateTimeValueObject */
    public function testGenerate(TestDateTimeValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideTestDateTimeValueObject(): array
    {
        $sutClassName = ClassName::create('MyVendor\\UserCreatedAt');
        $class        = ClassName::create('spec\\MyVendor\\UserCreatedAtTest');
        $parent       = ClassName::create('PhpUnit\\ObjectBehavior');

        return [
            [
                new TestDateTimeValueObject(
                    $class,
                    $parent,
                    [],
                    [],
                    [],
                    [
                        new TestDateTimeToStringMethod(),
                        new TestDateTimeCreateFromFormatMethod(),
                        new TestDateTimeSerializeMethod(),
                        new TestDateTimeDeserializeMethod($sutClassName),
                    ],
                    $sutClassName
                ),
                'datetime.output',
            ],
        ];
    }
}
