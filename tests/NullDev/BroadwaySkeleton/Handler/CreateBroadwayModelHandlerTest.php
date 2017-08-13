<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayModelHandler;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
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
        $modelIdClassType    = ClassType::createFromFullyQualified($className.'Id');
        $modelClassType      = ClassType::createFromFullyQualified($className.'Model');
        $repositoryClassType = ClassType::createFromFullyQualified($className.'Repository');

        $command = new CreateBroadwayModel($modelIdClassType, $modelClassType, $repositoryClassType);

        $result = $this->commandBus->handle($command);

        self::assertCount(9, $result);

        $this->assertOutputMatches($this->getExpectedOutputPath('id-src'), $result[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('model-src'), $result[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-src'), $result[2]);
        $this->assertOutputMatches($this->getExpectedOutputPath('id-test'), $result[3]);
        $this->assertOutputMatches($this->getExpectedOutputPath('model-test'), $result[4]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-test'), $result[5]);
        $this->assertOutputMatches($this->getExpectedOutputPath('id-spec'), $result[6]);
        $this->assertOutputMatches($this->getExpectedOutputPath('model-spec'), $result[7]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-spec'), $result[8]);
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
