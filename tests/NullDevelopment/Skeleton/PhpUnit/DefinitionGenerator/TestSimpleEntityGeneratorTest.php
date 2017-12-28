<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleEntity;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleEntityGenerator;
use NullDevelopment\Skeleton\PhpUnit\Method\SetUpMethod;
use NullDevelopment\Skeleton\PhpUnit\Method\TestGetterMethod;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleEntityGenerator
 * @group  integration
 */
class TestSimpleEntityGeneratorTest extends SfTestCase
{
    /** @var TestSimpleEntityGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestSimpleEntityGenerator::class);
    }

    /** @dataProvider provideTestSimpleEntity */
    public function testSupports(TestSimpleEntity $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideTestSimpleEntity */
    public function testGenerateAsString(TestSimpleEntity $definition, string $fileName)
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

    /** @dataProvider provideTestSimpleEntity */
    public function testGenerate(TestSimpleEntity $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideTestSimpleEntity(): array
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
                new TestSimpleEntity($class, $parent, [], [], [], [$letMethod, $exposesFirstName, $exposesValue]),
                'simple_entity.empty.output',
            ],
        ];
    }
}
