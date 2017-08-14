<?php

declare(strict_types=1);

namespace tests\NullDev\Theater\NamingStrategy;

use NullDev\Theater\BoundedContext\ContextName;
use NullDev\Theater\BoundedContext\ContextNamespace;
use NullDev\Theater\Naming\Aggregate\EntityClassName;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandClassName;
use NullDev\Theater\Naming\CommandHanderClassName;
use NullDev\Theater\Naming\EventClassName;
use NullDev\Theater\NamingStrategy\TheaterNamingStrategy;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Theater\NamingStrategy\TheaterNamingStrategy
 * @group  unit
 */
class TheaterNamingStrategyTest extends PHPUnit_Framework_TestCase
{
    /** @var TheaterNamingStrategy */
    private $theaterNamingStrategy;
    /** @var ContextName */
    private $contextName;
    /** @var ContextNamespace */
    private $contextNamespace;

    public function setUp()
    {
        $this->contextName           = new ContextName('Webshop');
        $this->contextNamespace      = new ContextNamespace('MyCompany\Webshop');
        $this->theaterNamingStrategy = new TheaterNamingStrategy($this->contextName, $this->contextNamespace);
    }

    public function testAggregateRootId()
    {
        $rootIdClassName = $this->theaterNamingStrategy->aggregateRootId();

        self::assertInstanceOf(RootIdClassName::class, $rootIdClassName);

        self::assertEquals('MyCompany\Webshop\Core\WebshopId', $rootIdClassName->getFullName());
    }

    public function testAggregateRootModel()
    {
        $rootModelClassName = $this->theaterNamingStrategy->aggregateRootModel();

        self::assertInstanceOf(RootModelClassName::class, $rootModelClassName);

        self::assertEquals('MyCompany\Webshop\Domain\WebshopModel', $rootModelClassName->getFullName());
    }

    public function testAggregateRootRepository()
    {
        $rootRepositoryClassName = $this->theaterNamingStrategy->aggregateRootRepository();

        self::assertInstanceOf(RootRepositoryClassName::class, $rootRepositoryClassName);

        self::assertEquals('MyCompany\Webshop\Domain\WebshopRepository', $rootRepositoryClassName->getFullName());
    }

    public function testAggregateEntity()
    {
        $entityClassName = $this->theaterNamingStrategy->aggregateEntity('Something');

        self::assertInstanceOf(EntityClassName::class, $entityClassName);

        self::assertEquals('MyCompany\Webshop\Domain\SomethingEntity', $entityClassName->getFullName());
    }

    public function testCommandHandler()
    {
        $commandHandlerClassName = $this->theaterNamingStrategy->commandHandler();

        self::assertInstanceOf(CommandHanderClassName::class, $commandHandlerClassName);

        self::assertEquals('MyCompany\Webshop\Application\WebshopCommandHandler', $commandHandlerClassName->getFullName());
    }

    public function testCommand()
    {
        $commandClassName = $this->theaterNamingStrategy->command('DoSomething');

        self::assertInstanceOf(CommandClassName::class, $commandClassName);

        self::assertEquals('MyCompany\Webshop\Domain\Command\DoSomething', $commandClassName->getFullName());
    }

    public function testEvent()
    {
        $eventClassName = $this->theaterNamingStrategy->event('DidSomething');

        self::assertInstanceOf(EventClassName::class, $eventClassName);

        self::assertEquals('MyCompany\Webshop\Domain\Event\DidSomething', $eventClassName->getFullName());
    }
}
