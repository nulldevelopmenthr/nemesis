<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadProjector;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadProjectorLoader;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadProjectorLoader
 * @group  integration
 */
class DoctrineReadProjectorLoaderTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var DoctrineReadProjectorLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(DoctrineReadProjectorLoader::class);
    }

    /** @dataProvider provideInputs */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInputs */
    public function testLoad(array $input, DoctrineReadProjector $expected)
    {
        self::assertEquals($expected, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'        => 'DoctrineReadProjector',
            'instanceOf'  => null,
            'parent'      => null,
            'interfaces'  => [],
            'traits'      => [],
            'constants'   => [],
            'properties'  => [],
            'methods'     => [],
            'constructor' => [],
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        return [
            [
                [
                    'type'        => 'DoctrineReadProjector',
                    'instanceOf'  => 'MyVendor\Projector\UserProjector',
                    'constructor' => [
                        'repository' => [
                            'instanceOf' => 'MyVendor\Repository\UserRepository',
                        ],
                        'factory' => [
                            'instanceOf' => 'MyVendor\Factory\UserFactory',
                        ],
                    ],
                    'properties' => [],
                ],
                new DoctrineReadProjector(
                    ClassName::create('MyVendor\Projector\UserProjector'),
                    null,
                    [],
                    [],
                    [],
                    [
                        Property::private('repository', ClassName::create('MyVendor\Repository\UserRepository')),
                        Property::private('factory', ClassName::create('MyVendor\Factory\UserFactory')),
                    ],
                    [
                        new ConstructorMethod(
                            [
                                Property::private('repository', ClassName::create('MyVendor\Repository\UserRepository')),
                                Property::private('factory', ClassName::create('MyVendor\Factory\UserFactory')),
                            ]
                        ),
                    ]
                ),
            ],
        ];
    }
}
