<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\ReadSide;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Theater\ReadSide\ReadSideImplementation;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\ReadSide\ReadSideImplementation
 * @group  todo
 */
class ReadSideImplementationTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $value;
    /** @var ReadSideImplementation */
    private $sut;

    public function setUp()
    {
        $this->value = ReadSideImplementation::DOCTRINE_ORM;
        $this->sut   = new ReadSideImplementation($this->value);
    }

    public function testGetValue()
    {
        self::assertEquals($this->value, $this->sut->getValue());
    }

    public function testToString()
    {
        self::assertEquals($this->value, $this->sut->__toString());
    }
}
