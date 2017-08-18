<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayModelHandler;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use tests\NullDev\AssertOutputTrait2;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\CreateBroadwayModelHandler
 * @group  nemesis
 */
class CreateBroadwayModelHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait2;

    /** @var CreateBroadwayModelHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(CreateBroadwayModelHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className): void
    {
        $modelIdClassName        = RootIdClassName::create($className.'Id');
        $modelClassName          = RootModelClassName::create($className.'Model');
        $repositoryClassName     = RootRepositoryClassName::create($className.'Repository');
        $commandHandlerClassName = CommandHandlerClassName::create($className.'CommandHandler');

        $command = new CreateBroadwayModel($modelIdClassName, $modelClassName, $repositoryClassName, $commandHandlerClassName);

        $result = $this->commandBus->handle($command);

        self::assertCount(12, $result);

        $this->assertOutputMatches($this->getExpectedOutputPath('id-src'), $result[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('model-src'), $result[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-src'), $result[2]);
        $this->assertOutputMatches($this->getExpectedOutputPath('handler-src'), $result[3]);
        $this->assertOutputMatches($this->getExpectedOutputPath('id-test'), $result[4]);
        $this->assertOutputMatches($this->getExpectedOutputPath('model-test'), $result[5]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-test'), $result[6]);
        $this->assertOutputMatches($this->getExpectedOutputPath('handler-test'), $result[7]);
        $this->assertOutputMatches($this->getExpectedOutputPath('id-spec'), $result[8]);
        $this->assertOutputMatches($this->getExpectedOutputPath('model-spec'), $result[9]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-spec'), $result[10]);
        $this->assertOutputMatches($this->getExpectedOutputPath('handler-spec'), $result[11]);
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
        return __DIR__.'/sample-output/CreateBroadwayModelHandlerTest/'.$fileName.'.output';
    }
}
