<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmReadFactory;
use NullDev\BroadwaySkeleton\Handler\BroadwayDoctrineOrmReadFactoryHandler;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Tests\NullDev\AssertOutputTrait2;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayDoctrineOrmReadFactoryHandler
 * @group  nemesis
 */
class BroadwayDoctrineOrmReadFactoryHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait2;

    /** @var BroadwayDoctrineOrmReadFactoryHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayDoctrineOrmReadFactoryHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className): void
    {
        $factoryClassType = ClassType::createFromFullyQualified($className.'Factory');

        $command = new CreateBroadwayDoctrineOrmReadFactory($factoryClassType);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputMatches($this->getExpectedOutputPath('factory-src'), $result[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('factory-test'), $result[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('factory-spec'), $result[2]);
    }

    public function provideData(): array
    {
        return [
            ['Something\User'],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/BroadwayDoctrineOrmReadFactoryHandlerTest/'.$fileName.'.output';
    }
}
