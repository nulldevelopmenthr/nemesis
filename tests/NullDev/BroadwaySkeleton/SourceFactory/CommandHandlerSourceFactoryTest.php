<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\SourceFactory;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\BroadwaySkeleton\Definition\PHP\DefinitionFactory;
use NullDev\BroadwaySkeleton\SourceFactory\CommandHandlerSourceFactory;
use NullDev\Skeleton\Source\ClassSourceFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\SourceFactory\CommandHandlerSourceFactory
 * @group  todo
 */
class CommandHandlerSourceFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|ClassSourceFactory */
    private $sourceFactory;
    /** @var MockInterface|DefinitionFactory */
    private $definitionFactory;
    /** @var CommandHandlerSourceFactory */
    private $commandHandlerSourceFactory;

    public function setUp()
    {
        $this->sourceFactory               = Mockery::mock(ClassSourceFactory::class);
        $this->definitionFactory           = Mockery::mock(DefinitionFactory::class);
        $this->commandHandlerSourceFactory = new CommandHandlerSourceFactory($this->sourceFactory, $this->definitionFactory);
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }
}
