<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadFactoryFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadFactoryFactory
 * @group  todo
 */
class TestDoctrineReadFactoryFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $factories;

    /** @var TestDoctrineReadFactoryFactory */
    private $sut;

    public function setUp()
    {
        $this->factories = [];
        $this->sut       = new TestDoctrineReadFactoryFactory($this->factories);
    }

    public function testCreateFromDoctrineReadFactory()
    {
        $this->markTestSkipped('Skipping');
    }
}
