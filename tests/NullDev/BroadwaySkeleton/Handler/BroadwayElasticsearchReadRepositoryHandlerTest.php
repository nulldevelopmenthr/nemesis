<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadRepository;
use NullDev\BroadwaySkeleton\Handler\BroadwayElasticsearchReadRepositoryHandler;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use tests\NullDev\AssertOutputTrait2;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayElasticsearchReadRepositoryHandler
 * @group  nemesis
 */
class BroadwayElasticsearchReadRepositoryHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait2;

    /** @var BroadwayElasticsearchReadRepositoryHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayElasticsearchReadRepositoryHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className): void
    {
        $repositoryClassType    = ClassType::createFromFullyQualified($className.'Repository');

        $command = new CreateBroadwayElasticsearchReadRepository($repositoryClassType);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputMatches($this->getExpectedOutputPath('repository-src'), $result[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-test'), $result[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-spec'), $result[2]);
    }

    public function provideData(): array
    {
        return [
            ['Something\User'],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/BroadwayElasticsearchReadRepositoryHandlerTest/'.$fileName.'.output';
    }
}
