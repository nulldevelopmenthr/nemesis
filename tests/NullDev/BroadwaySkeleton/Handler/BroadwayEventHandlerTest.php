<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayEvent;
use NullDev\BroadwaySkeleton\Handler\BroadwayEventHandler;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayEventHandler
 * @group  nemesis
 */
class BroadwayEventHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var BroadwayEventHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayEventHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(
        ClassType $classType,
        array $parameters,
        string $folderName
    ): void {
        $command = new CreateBroadwayEvent($classType, $parameters);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputResourceMatches($this->getExpectedOutputPath($folderName.'/event-src'), $result[0]);
        $this->assertOutputResourceMatches($this->getExpectedOutputPath($folderName.'/event-test'), $result[1]);
        $this->assertOutputResourceMatches($this->getExpectedOutputPath($folderName.'/event-spec'), $result[2]);
    }

    public function provideData(): array
    {
        return [
            [
                ClassType::createFromFullyQualified('Something\UserCreated'),
                [],
                'no-params',
            ],
            [
                ClassType::createFromFullyQualified('Something\UserCreated'),
                [
                    Parameter::create('name', 'string'),
                    Parameter::create('age', 'int'),
                    Parameter::create('height', 'float'),
                    Parameter::create('about'),
                    Parameter::create('company', 'Something\Company'),
                ],
                'mix-params',
            ],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/BroadwayEventHandlerTest/'.$fileName.'.output';
    }
}
