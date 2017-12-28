<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootRepository;
use NullDev\BroadwaySkeleton\Handler\BroadwayAggregateRootRepositoryHandler;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayAggregateRootRepositoryHandler
 * @group  nemesis
 */
class BroadwayAggregateRootRepositoryHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var BroadwayAggregateRootRepositoryHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayAggregateRootRepositoryHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className): void
    {
        $repositoryClassName = RootRepositoryClassName::create($className.'Repository');
        $modelClassName      = RootModelClassName::create($className.'Model');

        $command = new CreateBroadwayAggregateRootRepository($repositoryClassName, $modelClassName);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputResourceMatches($this->getExpectedOutputPath('repository-src'), $result[0]);
        $this->assertOutputResourceMatches($this->getExpectedOutputPath('repository-test'), $result[1]);
        $this->assertOutputResourceMatches($this->getExpectedOutputPath('repository-spec'), $result[2]);
    }

    public function provideData(): array
    {
        return [
            [
                'Something\User',
            ],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/BroadwayAggregateRootRepositoryHandlerTest/'.$fileName.'.output';
    }
}
