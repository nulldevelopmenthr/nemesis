<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadProjectorFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpUnit\TestDoctrineReadProjectorFactory
 * @group  todo
 */
class TestDoctrineReadProjectorFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var array */
    private $factories;

    /** @var TestDoctrineReadProjectorFactory */
    private $sut;

    public function setUp()
    {
        $this->factories = [];
        $this->sut       = new TestDoctrineReadProjectorFactory($this->factories);
    }

    public function testCreateFromDoctrineReadProjector()
    {
        $this->markTestSkipped('Skipping');
    }
}
