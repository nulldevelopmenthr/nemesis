<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayAggregateRootId;
use NullDev\BroadwaySkeleton\Handler\BroadwayAggregateRootIdHandler;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use tests\NullDev\AssertOutputTrait2;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayAggregateRootIdHandler
 * @group  nemesis
 */
class BroadwayAggregateRootIdHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait2;

    /** @var BroadwayAggregateRootIdHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayAggregateRootIdHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className): void
    {
        $modelIdClassName = RootIdClassName::create($className.'Id');

        $command = new CreateBroadwayAggregateRootId($modelIdClassName);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputMatches($this->getExpectedOutputPath('id-src'), $result[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('id-test'), $result[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('id-spec'), $result[2]);
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
        return __DIR__.'/sample-output/BroadwayAggregateRootIdHandlerTest/'.$fileName.'.output';
    }
}
