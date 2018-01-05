<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadRepository;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadRepositoryLoader;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\Method\RemoveMethod;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\Method\SaveMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\DoctrineReadRepositoryLoader
 * @group  integration
 */
class DoctrineReadRepositoryLoaderTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var DoctrineReadRepositoryLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(DoctrineReadRepositoryLoader::class);
    }

    /** @dataProvider provideInputs */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInputs */
    public function testLoad(array $input, DoctrineReadRepository $expected)
    {
        self::assertEquals($expected, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'       => 'DoctrineReadRepository',
            'instanceOf' => null,
            'parent'     => null,
            'interfaces' => [],
            'traits'     => [],
            'constants'  => [],
            'properties' => [],
            'methods'    => [],
            'entity'     => null,
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        return [
            [
                [
                    'type'       => 'DoctrineReadRepository',
                    'instanceOf' => 'MyVendor\UserRepository',
                    'properties' => [],
                    'entity'     => 'MyVendor\UserEntity',
                ],
                new DoctrineReadRepository(
                    ClassName::create('MyVendor\UserRepository'),
                    null,
                    [],
                    [],
                    [],
                    [],
                    [
                        new SaveMethod(ClassName::create('MyVendor\UserEntity')),
                        new RemoveMethod(ClassName::create('MyVendor\UserEntity')),
                    ]
                ),
            ],
        ];
    }
}
