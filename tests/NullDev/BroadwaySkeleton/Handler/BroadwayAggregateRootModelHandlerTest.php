<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootModel;
use NullDev\BroadwaySkeleton\Handler\BroadwayAggregateRootModelHandler;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use Tests\NullDev\AssertOutputTrait;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayAggregateRootModelHandler
 * @group  nemesis
 */
class BroadwayAggregateRootModelHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var BroadwayAggregateRootModelHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayAggregateRootModelHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className): void
    {
        $modelIdClassName = RootIdClassName::create($className.'Id');
        $modelClassName   = RootModelClassName::create($className.'Model');

        $command = new CreateBroadwayAggregateRootModel($modelClassName, $modelIdClassName);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputMatches2($this->getExpectedOutputPath('model-src'), $result[0]);
        $this->assertOutputMatches2($this->getExpectedOutputPath('model-test'), $result[1]);
        $this->assertOutputMatches2($this->getExpectedOutputPath('model-spec'), $result[2]);
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
        return __DIR__.'/sample-output/BroadwayAggregateRootModelHandlerTest/'.$fileName.'.output';
    }
}
