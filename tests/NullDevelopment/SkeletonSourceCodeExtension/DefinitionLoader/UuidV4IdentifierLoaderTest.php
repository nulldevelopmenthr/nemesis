<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonSourceCodeExtension\Definition\UuidV4Identifier;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\UuidV4IdentifierLoader;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\SerializeMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ToStringMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\UuidV4CreateMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\UuidV4IdentifierLoader
 * @group  integration
 */
class UuidV4IdentifierLoaderTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var UuidV4IdentifierLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(UuidV4IdentifierLoader::class);
    }

    /** @dataProvider provideInputs */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInputs */
    public function testLoad(array $input, UuidV4Identifier $expected)
    {
        self::assertEquals($expected, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'       => 'UuidV4Identifier',
            'instanceOf' => null,
            'parent'     => null,
            'interfaces' => [],
            'traits'     => [],
            'constants'  => [],
            'methods'    => [],
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        $className  = ClassName::create('MyVendor\User\UuidIdentifier');
        $idProperty = Property::private('id', ClassName::create('string'));

        return [
            [
                [
                    'type'       => 'UuidV4Identifier',
                    'instanceOf' => 'MyVendor\User\UuidIdentifier',
                ],
                new UuidV4Identifier(
                    $className,
                    null,
                    [],
                    [],
                    [],
                    [$idProperty],
                    [
                        new ConstructorMethod([$idProperty]),
                        new GetterMethod('getId', $idProperty),
                        new ToStringMethod($idProperty),
                        new SerializeMethod($className, [$idProperty]),
                        new DeserializeMethod($className, [$idProperty]),
                        new UuidV4CreateMethod(),
                    ]
                ),
            ],
        ];
    }
}
