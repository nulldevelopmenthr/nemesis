<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticsearchReadProjector;
use NullDev\BroadwaySkeleton\Handler\BroadwayElasticsearchReadProjectorHandler;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayElasticsearchReadProjectorHandler
 * @group  nemesis
 */
class BroadwayElasticsearchReadProjectorHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var BroadwayElasticsearchReadProjectorHandler */
    private $handler;

    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayElasticsearchReadProjectorHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className, array $parameters): void
    {
        $readProjectorClassType = ClassType::createFromFullyQualified($className.'Projector');

        $command = new CreateBroadwayElasticsearchReadProjector($readProjectorClassType, $parameters);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputResourceMatches($this->getExpectedOutputPath('projector-src'), $result[0]);
        $this->assertOutputResourceMatches($this->getExpectedOutputPath('projector-test'), $result[1]);
        $this->assertOutputResourceMatches($this->getExpectedOutputPath('projector-spec'), $result[2]);
    }

    public function provideData(): array
    {
        return [
            [
                'Something\User',
                [
                    Parameter::create('repository', 'Something\UserRepository'),
                    Parameter::create('factory', 'Something\UserFactory'),
                ],
            ],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/BroadwayElasticsearchReadProjectorHandlerTest/'.$fileName.'.output';
    }
}
