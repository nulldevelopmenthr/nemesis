<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleIdentifier;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleIdentifierGenerator;
use NullDevelopment\Skeleton\PhpUnit\Method\SetUpMethod;
use NullDevelopment\Skeleton\PhpUnit\Method\TestGetterMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleIdentifierGenerator
 * @group  integration
 */
class TestSimpleIdentifierGeneratorTest extends SfTestCase
{
    /** @var TestSimpleIdentifierGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestSimpleIdentifierGenerator::class);
    }

    /** @dataProvider provideTestSimpleIdentifier */
    public function testSupports(TestSimpleIdentifier $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideTestSimpleIdentifier */
    public function testGenerateAsString(TestSimpleIdentifier $definition, string $fileName)
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

    /** @dataProvider provideTestSimpleIdentifier */
    public function testGenerate(TestSimpleIdentifier $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideTestSimpleIdentifier(): array
    {
        $sutClass = Fixtures::userEntity();

        $firstName = Fixtures::firstNameProperty();

        $class  = ClassName::create('spec\\MyVendor\\UserEntityTest');
        $parent = ClassName::create('PhpUnit\\ObjectBehavior');

        $letMethod        = new SetUpMethod($sutClass, [$firstName]);
        $exposesFirstName = new TestGetterMethod('it_exposes_first_name', 'getFirstName', $firstName);
        $exposesValue     = new TestGetterMethod('it_exposes_value', 'getValue', $firstName);

        return [
            [
                new TestSimpleIdentifier($class, $parent, [], [], [], [$letMethod, $exposesFirstName, $exposesValue]),
                'simple_identifier.empty.output',
            ],
        ];
    }
}
