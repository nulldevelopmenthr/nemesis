<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\PhpStructure\DataType;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDevelopment\PhpStructure\DataType\SimpleVariable;
use NullDevelopment\PhpStructure\DataTypeName\ContractName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\DataType\SimpleVariable
 * @group  todo
 */
class SimpleVariableTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $name;
    /** @var MockInterface|ContractName */
    private $contractName;
    /** @var SimpleVariable */
    private $sut;

    public function setUp()
    {
        $this->name         = 'name';
        $this->contractName = Mockery::mock(ContractName::class);
        $this->sut          = new SimpleVariable($this->name, $this->contractName);
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetInstanceName()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testGetInstanceFullName()
    {
        $this->markTestSkipped('Skipping');
    }
}
