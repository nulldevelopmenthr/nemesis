<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\BoundedContext;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Theater\BoundedContext\CommandConfig;
use NullDev\Theater\Naming\CommandClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\BoundedContext\CommandConfig
 * @group  todo
 */
class CommandConfigTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $name;
    /** @var MockInterface|CommandClassName */
    private $commandClassName;
    /** @var array */
    private $parameters;
    /** @var CommandConfig */
    private $sut;

    public function setUp()
    {
        $this->name             = 'name';
        $this->commandClassName = Mockery::mock(CommandClassName::class);
        $this->parameters       = [];
        $this->sut              = new CommandConfig($this->name, $this->commandClassName, $this->parameters);
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->sut->getName());
    }

    public function testGetCommandClassName()
    {
        self::assertEquals($this->commandClassName, $this->sut->getCommandClassName());
    }

    public function testGetParameters()
    {
        self::assertEquals($this->parameters, $this->sut->getParameters());
    }
}
