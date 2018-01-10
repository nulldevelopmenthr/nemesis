<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommandHandler;
use NullDev\BroadwaySkeleton\Handler\BroadwayCommandHandlerHandler;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayCommandHandlerHandler
 * @group  codeGeneration
 */
class BroadwayCommandHandlerHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var BroadwayCommandHandlerHandler */
    private $handler;

    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        $this->handler    = $this->getService(BroadwayCommandHandlerHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(
        CommandHandlerClassName $handlerClassName,
        RootRepositoryClassName $repositoryClassName,
        RootIdClassName $idClassName,
        RootModelClassName $modelClassName
    ): void {
        $command = new CreateBroadwayCommandHandler(
            $handlerClassName, $repositoryClassName, $idClassName, $modelClassName
        );

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputResourceMatches($this->getExpectedOutputPath('handler-src'), $result[0]);
        $this->assertOutputResourceMatches($this->getExpectedOutputPath('handler-test'), $result[1]);
        $this->assertOutputResourceMatches($this->getExpectedOutputPath('handler-spec'), $result[2]);
    }

    public function provideData(): array
    {
        return [
            [
                CommandHandlerClassName::create('MyCompany\Webshop\Buyers\Application\BuyersCommandHandler'),
                RootRepositoryClassName::create('MyCompany\Webshop\Buyers\Domain\BuyerRepository'),
                RootIdClassName::create('MyCompany\Webshop\Buyers\Core\BuyerId'),
                RootModelClassName::create('MyCompany\Webshop\Buyers\Domain\BuyerModel'),
            ],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/BroadwayCommandHandlerHandlerTest/'.$fileName.'.output';
    }
}
