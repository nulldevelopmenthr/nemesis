<?php

declare(strict_types=1);

namespace tests\NullDevelopment\PhpStructure\DataTypeName;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ConstantName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\DataTypeName\ConstantName
 * @group  unit
 */
class ConstantNameTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $name;
    /** @var ConstantName */
    private $sut;

    public function setUp()
    {
        $this->name = 'name';
        $this->sut  = new ConstantName($this->name);
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testToString()
    {
        self::assertEquals($this->name, $this->sut->__toString());
    }
}
