<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\ReadSide;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\ReadSide\ReadSideName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\ReadSide\ReadSideName
 * @group  todo
 */
class ReadSideNameTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var string */
    private $name;

    /** @var ReadSideName */
    private $sut;

    public function setUp()
    {
        $this->name = 'name';
        $this->sut  = new ReadSideName($this->name);
    }

    public function testGetValue()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testToString()
    {
        $this->markTestSkipped('Skipping');
    }
}
