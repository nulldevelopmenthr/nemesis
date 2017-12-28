<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleCollectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\DefinitionFactory\TestSimpleCollectionFactory
 * @group  todo
 */
class TestSimpleCollectionFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var array */
    private $factories;
    /** @var TestSimpleCollectionFactory */
    private $sut;

    public function setUp()
    {
        $this->factories = [];
        $this->sut       = new TestSimpleCollectionFactory($this->factories);
    }

    public function testCreateFromSimpleCollection()
    {
        $this->markTestSkipped('Skipping');
    }
}
