<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\Skeleton\SourceCode\Definition\SingleValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SingleValueObjectGenerator;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\Skeleton\SourceCode\Method\SerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\ToStringMethod;
use Tests\NullDev\AssertOutputTrait;
use Tests\TestCase\Fixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionGenerator\SingleValueObjectGenerator
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SingleValueObjectGeneratorTest extends SfTestCase
{
    use AssertOutputTrait;
    /** @var SingleValueObjectGenerator */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SingleValueObjectGenerator::class);
    }

    /** @dataProvider provideSingleValueObject */
    public function testSupports(SingleValueObject $definition)
    {
        self::assertTrue($this->sut->supports($definition));
    }

    /** @dataProvider provideSingleValueObject */
    public function testGenerateAsString(SingleValueObject $definition, string $fileName)
    {
        $filePath = __DIR__.'/output/'.$fileName;
        $result   = $this->sut->generateAsString($definition);

        $this->assertOutputContentMatches($filePath, $result);
    }

    /** @dataProvider provideSingleValueObject */
    public function testGenerate(SingleValueObject $definition)
    {
        $result = $this->sut->generate($definition);

        self::assertInstanceOf(PhpNamespace::class, $result);
    }

    public function provideSingleValueObject(): array
    {
        $class      = Fixtures::userEntity();
        $parent     = ClassName::create('MyVendor\\Core\\BaseModel');
        $interface1 = InterfaceName::create('MyVendor\\Core\\SomeInterface');
        $trait1     = TraitName::create('MyVendor\\Core\\ImportantTrait');

        $firstName = Fixtures::firstNameProperty();

        $constructorMethod = new ConstructorMethod([$firstName]);
        $getterMethod      = new GetterMethod('getFirstName', $firstName);
        $getValueMethod    = new GetterMethod('getValue', $firstName);

        $toStringMethod    = new ToStringMethod($firstName);
        $serializeMethod   = new SerializeMethod($class, [$firstName]);
        $deserializeMethod = new DeserializeMethod($class, [$firstName]);

        return [
            [
                new SingleValueObject($class, null, [], [], [], []),
                'single_value_object.empty.output',
            ],
            [
                new SingleValueObject($class, $parent, [$interface1], [$trait1], [$firstName], []),
                'single_value_object.without_property.output',
            ],
            [
                new SingleValueObject(
                    $class,
                    null,
                    [],
                    [],
                    [$firstName],
                    [
                        $constructorMethod,
                        $getterMethod,
                        $getValueMethod,
                        $toStringMethod,
                        $serializeMethod,
                        $deserializeMethod,
                    ]
                ),
                'single_value_object.first_name.output',
            ],
        ];
    }
}
