<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSingleValueObject;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSingleValueObjectGenerator;
use NullDevelopment\Skeleton\PhpUnit\Method\SetUpMethod;
use NullDevelopment\Skeleton\PhpUnit\Method\TestGetterMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSingleValueObjectGenerator
 * @group  integration
 */
class TestSingleValueObjectGeneratorTest extends SfTestCase
{
    /** @var TestSingleValueObjectGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestSingleValueObjectGenerator::class);
    }

    /** @dataProvider provideTestSingleValueObject */
    public function testSupports(TestSingleValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideTestSingleValueObject */
    public function testGenerateAsString(TestSingleValueObject $definition, string $fileName)
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

    /** @dataProvider provideTestSingleValueObject */
    public function testGenerate(TestSingleValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideTestSingleValueObject(): array
    {
        $sutClass = Fixtures::userEntity();

        $firstName = Fixtures::firstNameProperty();

        $class  = ClassName::create('spec\\MyVendor\\UserEntityTest');
        $parent = ClassName::create('PhpUnit\\ObjectBehavior');

        $letMethod        = new SetUpMethod($sutClass, [$firstName]);
        $exposesFirstName = new TestGetterMethod('testGetFirstName', 'getFirstName', $firstName);
        $exposesValue     = new TestGetterMethod('testGetValue', 'getValue', $firstName);

        return [
            [
                new TestSingleValueObject($class, $parent, [], [], [], [$letMethod, $exposesFirstName, $exposesValue]),
                'single_value_object.empty.output',
            ],
        ];
    }
}
