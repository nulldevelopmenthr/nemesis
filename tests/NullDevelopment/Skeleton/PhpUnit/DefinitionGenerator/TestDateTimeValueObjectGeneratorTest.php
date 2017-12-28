<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestDateTimeValueObject;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestDateTimeValueObjectGenerator;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeCreateFromFormatMethod;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeDeserializeMethod;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeSerializeMethod;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeToStringMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestDateTimeValueObjectGenerator
 * @group  integration
 */
class TestDateTimeValueObjectGeneratorTest extends SfTestCase
{
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
        $fileName = __DIR__.'/output/'.$fileName;
        $expected = @file_get_contents($fileName);

        $result = $this->sut->generateAsString($definition);

        if (true === empty($expected)) {
            file_put_contents($fileName, $result);
            self::markTestSkipped('Generating output for '.$fileName);
        } else {
            self::assertEquals($expected, $result);
        }
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
                    ]
                ),
                'datetime.output',
            ],
        ];
    }
}
