<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\BroadwaySkeleton\Handler\BroadwayCommandHandler;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayCommandHandler
 * @group  nemesis
 */
class BroadwayCommandHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var BroadwayCommandHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayCommandHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(ClassType $classType, array $parameters, string $folderName): void
    {
        $command = new CreateBroadwayCommand($classType, $parameters);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputResourceMatches($this->getExpectedOutputPath($folderName.'/command-src'), $result[0]);
        $this->assertOutputResourceMatches($this->getExpectedOutputPath($folderName.'/command-test'), $result[1]);
        $this->assertOutputResourceMatches($this->getExpectedOutputPath($folderName.'/command-spec'), $result[2]);
    }

    public function provideData(): array
    {
        return [
            [
                ClassType::createFromFullyQualified('Something\CreateUserCommand'),
                [],
                'no-params',
            ],
            [
                ClassType::createFromFullyQualified('Something\CreateUserCommand'),
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
        return __DIR__.'/sample-output/BroadwayCommandHandlerTest/'.$fileName.'.output';
    }
}
