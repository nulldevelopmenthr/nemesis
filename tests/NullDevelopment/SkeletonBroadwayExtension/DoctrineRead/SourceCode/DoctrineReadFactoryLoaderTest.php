<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadFactory;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadFactoryLoader;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadFactoryLoader
 * @group  integration
 */
class DoctrineReadFactoryLoaderTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var DoctrineReadFactoryLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(DoctrineReadFactoryLoader::class);
    }

    /** @dataProvider provideInputs */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInputs */
    public function testLoad(array $input, DoctrineReadFactory $expected)
    {
        self::assertEquals($expected, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'        => 'DoctrineReadFactory',
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
                    'type'        => 'DoctrineReadFactory',
                    'instanceOf'  => 'MyVendor\Factory\UserFactory',
                    'constructor' => [],
                    'properties'  => [],
                ],
                new DoctrineReadFactory(
                    ClassName::create('MyVendor\Factory\UserFactory'),
                    null,
                    [],
                    [],
                    [],
                    [],
                    [
                        new ConstructorMethod([]),
                    ]
                ),
            ],
        ];
    }
}
