<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadRepositoryFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadRepositoryFactory
 * @group  todo
 */
class TestDoctrineReadRepositoryFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $factories;

    /** @var TestDoctrineReadRepositoryFactory */
    private $sut;

    public function setUp()
    {
        $this->factories = [];
        $this->sut       = new TestDoctrineReadRepositoryFactory($this->factories);
    }

    public function testCreateFromDoctrineReadRepository()
    {
        $this->markTestSkipped('Skipping');
    }
}
