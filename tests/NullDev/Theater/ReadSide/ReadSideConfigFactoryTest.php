<?php

declare(strict_types=1);

namespace tests\NullDev\Theater\ReadSide;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\ReadSide\ReadSideConfigFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\ReadSide\ReadSideConfigFactory
 * @group  todo
 */
class ReadSideConfigFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ReadSideConfigFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new ReadSideConfigFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromArray()
    {
        $this->markTestSkipped('Skipping');
    }
}
