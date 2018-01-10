<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\ObjectConfigurationLoaderCollection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\ObjectConfigurationLoaderCollection
 * @group  todo
 */
class ObjectConfigurationLoaderCollectionTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $loaders;

    /** @var ObjectConfigurationLoaderCollection */
    private $sut;

    public function setUp()
    {
        $this->loaders = [];
        $this->sut     = new ObjectConfigurationLoaderCollection($this->loaders);
    }

    public function testGetLoaders()
    {
        self::assertEquals($this->loaders, $this->sut->getLoaders());
    }

    public function testFindAndLoad()
    {
        $this->markTestSkipped('Skipping');
    }
}
