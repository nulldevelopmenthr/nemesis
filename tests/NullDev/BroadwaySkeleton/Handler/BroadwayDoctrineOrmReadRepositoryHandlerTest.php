<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadRepository;
use NullDev\BroadwaySkeleton\Handler\BroadwayDoctrineOrmReadRepositoryHandler;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Tests\NullDev\AssertOutputTrait;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayDoctrineOrmReadRepositoryHandler
 * @group  nemesis
 */
class BroadwayDoctrineOrmReadRepositoryHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var BroadwayDoctrineOrmReadRepositoryHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayDoctrineOrmReadRepositoryHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className): void
    {
        $repositoryClassType = ClassType::createFromFullyQualified($className.'Repository');

        $command = new CreateBroadwayDoctrineOrmReadRepository($repositoryClassType);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputMatches2($this->getExpectedOutputPath('repository-src'), $result[0]);
        $this->assertOutputMatches2($this->getExpectedOutputPath('repository-test'), $result[1]);
        $this->assertOutputMatches2($this->getExpectedOutputPath('repository-spec'), $result[2]);
    }

    public function provideData(): array
    {
        return [
            ['Something\User'],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/BroadwayDoctrineOrmReadRepositoryHandlerTest/'.$fileName.'.output';
    }
}
