<?php

declare(strict_types=1);

namespace tests\NullDevelopment\PhpStructure\DataType;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataTypeName\ConstantName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\DataType\Constant
 * @group  unit
 */
class ConstantTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ConstantName */
    private $constantName;
    /** @var mixed */
    private $value;
    /** @var Constant */
    private $sut;

    public function setUp()
    {
        $this->constantName = Mockery::mock(ConstantName::class);
        $this->value        = 'value';
        $this->sut          = new Constant($this->constantName, $this->value);
    }

    public function testGetConstantName()
    {
        self::assertEquals($this->constantName, $this->sut->getConstantName());
    }

    public function testGetValue()
    {
        self::assertEquals($this->value, $this->sut->getValue());
    }
}
