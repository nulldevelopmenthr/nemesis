<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Command;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommandHandler;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Command\CreateBroadwayCommandHandler
 * @group  unit
 */
class CreateBroadwayCommandHandlerTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|CommandHandlerClassName */
    private $handlerClassName;
    /** @var MockInterface|RootRepositoryClassName */
    private $repositoryClassName;
    /** @var MockInterface|RootIdClassName */
    private $idClassName;
    /** @var MockInterface|RootModelClassName */
    private $modelClassName;
    /** @var CreateBroadwayCommandHandler */
    private $CreateBroadwayCommandHandler;

    public function setUp()
    {
        $this->handlerClassName    = Mockery::mock(CommandHandlerClassName::class);
        $this->repositoryClassName = Mockery::mock(RootRepositoryClassName::class);
        $this->idClassName         = Mockery::mock(RootIdClassName::class);
        $this->modelClassName      = Mockery::mock(RootModelClassName::class);

        $this->CreateBroadwayCommandHandler = new CreateBroadwayCommandHandler(
            $this->handlerClassName,
            $this->repositoryClassName,
            $this->idClassName,
            $this->modelClassName
        );
    }

    public function testGetHandlerClassName()
    {
        self::assertEquals($this->handlerClassName, $this->CreateBroadwayCommandHandler->getHandlerClassName());
    }

    public function testGetRepositoryClassName()
    {
        self::assertEquals($this->repositoryClassName, $this->CreateBroadwayCommandHandler->getRepositoryClassName());
    }
}
