<?php

declare(strict_types=1);

namespace tests\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use NullDevelopment\Skeleton\Definition\SimpleIdentifier;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\SimpleIdentifierLoader;
use tests\TestCase\SfTestCase;

/**
 * @group  application
 * @coversNothing
 */
class SimpleIdentifierLoaderTest extends SfTestCase
{
    /** @var SimpleIdentifierLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SimpleIdentifierLoader::class);
    }

    /** @dataProvider provideInput */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInput */
    public function testLoad(array $input)
    {
        self::assertInstanceOf(SimpleIdentifier::class, $this->sut->load($input));
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
            [$this->loadDefinitionYaml('MyVendor/User/UserId.yaml')],
            [$this->loadDefinitionYaml('MyVendor/Product/ProductId.yaml')],
        ];
    }
}
