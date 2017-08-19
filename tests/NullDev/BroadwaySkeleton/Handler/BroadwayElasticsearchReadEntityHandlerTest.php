<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadEntity;
use NullDev\BroadwaySkeleton\Handler\BroadwayElasticsearchReadEntityHandler;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use tests\NullDev\AssertOutputTrait2;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayElasticsearchReadEntityHandler
 * @group  nemesis
 */
class BroadwayElasticsearchReadEntityHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait2;

    /** @var BroadwayElasticsearchReadEntityHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayElasticsearchReadEntityHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className, array $parameters): void
    {
        $readEntityClassType = ClassType::createFromFullyQualified($className.'Entity');

        $command = new CreateBroadwayElasticsearchReadEntity($readEntityClassType, $parameters);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputMatches($this->getExpectedOutputPath('entity-src'), $result[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('entity-test'), $result[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('entity-spec'), $result[2]);
    }

    public function provideData(): array
    {
        return [
            [
                'Something\User',
                [
                    Parameter::create('id', 'Something\UserId'),
                ],
            ],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/BroadwayElasticsearchReadEntityHandlerTest/'.$fileName.'.output';
    }
}
