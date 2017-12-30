<?php

declare(strict_types=1);

namespace Tests\NullDev\Theater\BoundedContext;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\Theater\BoundedContext\BoundedContextConfig;
use NullDev\Theater\BoundedContext\CommandConfig;
use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\BoundedContext\EventConfig;
use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Theater\BoundedContext\BoundedContextConfig
 * @group  unit
 */
class BoundedContextConfigTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var MockInterface|ContextName */
    private $name;

    /** @var MockInterface|ContextNamespace */
    private $namespace;

    /** @var MockInterface|RootIdClassName */
    private $rootIdClassName;

    /** @var MockInterface|RootModelClassName */
    private $modelClassName;

    /** @var MockInterface|RootRepositoryClassName */
    private $repositoryClassName;

    /** @var MockInterface|CommandHandlerClassName */
    private $commandHandlerClassName;

    /** @var BoundedContextConfig */
    private $config;

    public function setUp()
    {
        $this->name                    = Mockery::mock(ContextName::class);
        $this->namespace               = Mockery::mock(ContextNamespace::class);
        $this->rootIdClassName         = Mockery::mock(RootIdClassName::class);
        $this->modelClassName          = Mockery::mock(RootModelClassName::class);
        $this->repositoryClassName     = Mockery::mock(RootRepositoryClassName::class);
        $this->commandHandlerClassName = Mockery::mock(CommandHandlerClassName::class);
        $this->config                  = new BoundedContextConfig(
            $this->name,
            $this->namespace,
            $this->rootIdClassName,
            $this->modelClassName,
            $this->repositoryClassName,
            $this->commandHandlerClassName
        );
    }

    public function testGetName()
    {
        self::assertEquals($this->name, $this->config->getName());
    }

    public function testGetNamespace()
    {
        self::assertEquals($this->namespace, $this->config->getNamespace());
    }

    public function testGetRootIdClassName()
    {
        self::assertEquals($this->rootIdClassName, $this->config->getRootIdClassName());
    }

    public function testGetModelClassName()
    {
        self::assertEquals($this->modelClassName, $this->config->getModelClassName());
    }

    public function testGetRepositoryClassName()
    {
        self::assertEquals($this->repositoryClassName, $this->config->getRepositoryClassName());
    }

    public function testGetCommandHandlerClassName()
    {
        self::assertEquals($this->commandHandlerClassName, $this->config->getCommandHandlerClassName());
    }

    public function testGetEntityClassNames()
    {
        self::assertEmpty($this->config->getEntityClassNames());
    }

    public function testGetCommands()
    {
        self::assertEmpty($this->config->getCommands());
    }

    public function testGetEvents()
    {
        self::assertEmpty($this->config->getEvents());
    }

    public function testAddEntity()
    {
        $entity = Mockery::mock(EntityClassName::class);

        $this->config->addEntity($entity);
        self::assertEquals([$entity], $this->config->getEntityClassNames());
    }

    public function testAddCommand()
    {
        $command = Mockery::mock(CommandConfig::class);

        $this->config->addCommand($command);
        self::assertEquals([$command], $this->config->getCommands());
    }

    public function testAddEvent()
    {
        $event = Mockery::mock(EventConfig::class);

        $this->config->addEvent($event);
        self::assertEquals([$event], $this->config->getEvents());
    }

    public function testToArray()
    {
        $this->namespace->shouldReceive('getValue')
            ->andReturn('MyCompany\Webshop\Buyers');
        $this->rootIdClassName->shouldReceive('getFullName')
            ->andReturn('MyCompany\Webshop\Buyers\Core\BuyerId');
        $this->modelClassName->shouldReceive('getFullName')
            ->andReturn('MyCompany\Webshop\Buyers\Domain\BuyerModel');
        $this->repositoryClassName->shouldReceive('getFullName')
            ->andReturn('MyCompany\Webshop\Buyers\Domain\BuyerRepository');
        $this->commandHandlerClassName->shouldReceive('getFullName')
            ->andReturn('MyCompany\Webshop\Buyers\Application\BuyersCommandHandler');

        $expected = [
            'namespace' => 'MyCompany\Webshop\Buyers',
            'classes'   => [
                'id'         => 'MyCompany\Webshop\Buyers\Core\BuyerId',
                'model'      => 'MyCompany\Webshop\Buyers\Domain\BuyerModel',
                'repository' => 'MyCompany\Webshop\Buyers\Domain\BuyerRepository',
                'handler'    => 'MyCompany\Webshop\Buyers\Application\BuyersCommandHandler',
                'entities'   => [],
                'commands'   => [],
                'events'     => [],
            ],
        ];

        self::assertEquals($expected, $this->config->toArray());
    }
}
