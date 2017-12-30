<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\CustomType\CollectionOf;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleCollectionGenerator;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SimpleCollectionGenerator
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SimpleCollectionGeneratorTest extends SfTestCase
{
    use AssertOutputTrait;

    /** @var SimpleCollectionGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SimpleCollectionGenerator::class);
    }

    /** @dataProvider provideSimpleCollection */
    public function testSupports(SimpleCollection $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideSimpleCollection */
    public function testGenerateAsString(SimpleCollection $definition, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideSimpleCollection */
    public function testGenerate(SimpleCollection $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideSimpleCollection(): array
    {
        $class   = Fixtures::userEntity();
        $integer = Fixtures::integerIdProperty();

        $constructorMethod = new ConstructorMethod([$integer]);
        $getIdMethod       = new GetterMethod('getId', $integer);

        $toStringMethod    = new ToStringMethod($integer);
        $serializeMethod   = new SerializeMethod($class, [$integer]);
        $deserializeMethod = new DeserializeMethod($class, [$integer]);

        return [
            [
                new SimpleCollection(
                    $class,
                    null,
                    [],
                    [],
                    [$integer],
                    [
                        $constructorMethod,
                        $getIdMethod,
                        $toStringMethod,
                        $serializeMethod,
                        $deserializeMethod,
                    ],
                    new CollectionOf(
                        ClassName::create('MyVendor\User\Username'),
                        'getId',
                        ClassName::create('MyVendor\User\UserId')
                    )
                ),
                'simple_collection.first_name.output',
            ],
        ];
    }
}
