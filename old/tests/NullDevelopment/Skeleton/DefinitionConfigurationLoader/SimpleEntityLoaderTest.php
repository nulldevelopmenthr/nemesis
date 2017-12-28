<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\Skeleton\Definition\SimpleEntity;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\SimpleEntityLoader;
use Tests\TestCase\SfTestCase;

/**
 * @group  application
 * @coversNothing
 */
class SimpleEntityLoaderTest extends SfTestCase
{
    /** @var SimpleEntityLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SimpleEntityLoader::class);
    }

    /** @dataProvider provideInput */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInput */
    public function testLoad(array $input)
    {
        self::assertInstanceOf(SimpleEntity::class, $this->sut->load($input));
    }

    /** @dataProvider provideInput */
    public function testToArrayOnDefinitionWorks(array $input)
    {
        $definition = $this->sut->load($input);

        self::assertEquals($input, $definition->toArray()['definition']);
    }

    public function provideInput(): array
    {
        return [
            [$this->loadDefinitionYaml('MyVendor/UserEntity.yaml')],
            [$this->loadDefinitionYaml('MyVendor/ProductEntity.yaml')],
        ];
    }
}
