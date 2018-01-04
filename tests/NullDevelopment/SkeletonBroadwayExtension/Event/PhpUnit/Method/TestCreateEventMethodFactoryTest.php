<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method\TestCreateEventMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpUnit\Method\TestCreateEventMethodFactory
 * @group  todo
 */
class TestCreateEventMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var TestCreateEventMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestCreateEventMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromCreateEventMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
