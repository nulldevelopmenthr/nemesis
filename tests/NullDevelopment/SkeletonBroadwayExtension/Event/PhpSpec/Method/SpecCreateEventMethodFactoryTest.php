<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\Method;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\Method\SpecCreateEventMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Event\PhpSpec\Method\SpecCreateEventMethodFactory
 * @group  todo
 */
class SpecCreateEventMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecCreateEventMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecCreateEventMethodFactory();
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
