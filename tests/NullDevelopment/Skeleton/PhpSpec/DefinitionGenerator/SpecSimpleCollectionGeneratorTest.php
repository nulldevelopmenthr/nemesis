<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleCollection;
use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleCollectionGenerator;
use NullDevelopment\Skeleton\PhpSpec\Method\GetterSpecMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\LetMethod;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleCollectionGenerator
 * @group  integration
 */
class SpecSimpleCollectionGeneratorTest extends SfTestCase
{
    use AssertOutputTrait;
    /** @var SpecSimpleCollectionGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecSimpleCollectionGenerator::class);
    }

    /** @dataProvider provideSpecSimpleCollection */
    public function testSupports(SpecSimpleCollection $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideSpecSimpleCollection */
    public function testGenerateAsString(SpecSimpleCollection $definition, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideSpecSimpleCollection */
    public function testGenerate(SpecSimpleCollection $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideSpecSimpleCollection(): array
    {
        $sutClass = Fixtures::userEntity();

        $firstName = Fixtures::firstNameProperty();

        $class  = ClassName::create('spec\\MyVendor\\UserEntitySpec');
        $parent = ClassName::create('PhpSpec\\ObjectBehavior');

        $letMethod           = new LetMethod([$firstName]);
        $initializableMethod = new InitializableMethod($sutClass, null, []);
        $exposesFirstName    = new GetterSpecMethod('it_exposes_first_name', 'getFirstName', $firstName);
        $exposesValue        = new GetterSpecMethod('it_exposes_value', 'getValue', $firstName);
        $collectionOf        = new CollectionOf(
            ClassName::create('MyVendor\User\Username'),
            'getId',
            ClassName::create('MyVendor\User\UserId')
        );

        return [
            [
                new SpecSimpleCollection(
                    $class,
                    $parent,
                    [],
                    [],
                    [],
                    [$letMethod, $initializableMethod, $exposesFirstName, $exposesValue],
                    $collectionOf,
                    $sutClass
                ),
                'simple_collection.empty.output',
            ],
        ];
    }
}
