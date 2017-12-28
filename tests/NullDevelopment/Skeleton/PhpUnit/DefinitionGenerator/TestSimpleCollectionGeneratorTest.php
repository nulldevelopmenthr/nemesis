<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Definition\TestSimpleCollection;
use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleCollectionGenerator;
use NullDevelopment\Skeleton\PhpUnit\Method\SetUpMethod;
use NullDevelopment\Skeleton\PhpUnit\Method\TestGetterMethod;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSimpleCollectionGenerator
 * @group  integration
 */
class TestSimpleCollectionGeneratorTest extends SfTestCase
{
    use AssertOutputTrait;
    /** @var TestSimpleCollectionGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestSimpleCollectionGenerator::class);
    }

    /** @dataProvider provideTestSimpleCollection */
    public function testSupports(TestSimpleCollection $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideTestSimpleCollection */
    public function testGenerateAsString(TestSimpleCollection $definition, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideTestSimpleCollection */
    public function testGenerate(TestSimpleCollection $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideTestSimpleCollection(): array
    {
        $sutClass = Fixtures::userEntity();

        $firstName = Fixtures::firstNameProperty();

        $class  = ClassName::create('spec\\MyVendor\\UserEntityTest');
        $parent = ClassName::create('PhpUnit\\ObjectBehavior');

        $letMethod        = new SetUpMethod($sutClass, [$firstName]);
        $exposesFirstName = new TestGetterMethod('it_exposes_first_name', 'getFirstName', $firstName);
        $exposesValue     = new TestGetterMethod('it_exposes_value', 'getValue', $firstName);
        $collectionOf     = new CollectionOf(
            ClassName::create('MyVendor\User\Username'),
            'getId',
            ClassName::create('MyVendor\User\UserId')
        );

        return [
            [
                new TestSimpleCollection(
                    $class,
                    $parent,
                    [],
                    [],
                    [],
                    [$letMethod, $exposesFirstName, $exposesValue],
                    $collectionOf,
                    $sutClass
                ),
                'simple_collection.empty.output',
            ],
        ];
    }
}
