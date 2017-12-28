<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\Skeleton\Definition\SimpleCollection;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\SimpleCollectionLoader;
use Tests\TestCase\SfTestCase;

/**
 * @group application
 * @coversNothing
 */
class SimpleCollectionLoaderTest extends SfTestCase
{
    /** @var SimpleCollectionLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SimpleCollectionLoader::class);
    }

    /** @dataProvider provideInput */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInput */
    public function testLoad(array $input)
    {
        self::assertInstanceOf(SimpleCollection::class, $this->sut->load($input));
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
            [$this->loadDefinitionYaml('MyVendor/ProductCollection.yaml')],
        ];
    }
}
