<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayHandler;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayHandlerHandler;
use NullDev\Theater\Naming\Aggregate\RootIdClassName;
use NullDev\Theater\Naming\Aggregate\RootModelClassName;
use NullDev\Theater\Naming\Aggregate\RootRepositoryClassName;
use NullDev\Theater\Naming\CommandHandlerClassName;
use tests\NullDev\AssertOutputTrait2;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\CreateBroadwayHandlerHandler
 * @group  codeGeneration
 */
class CreateBroadwayHandlerHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait2;

    /** @var CreateBroadwayHandlerHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        $this->handler    = $this->getService(CreateBroadwayHandlerHandler::class);
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
        $command = new CreateBroadwayHandler($handlerClassName, $repositoryClassName, $idClassName, $modelClassName);

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputMatches($this->getExpectedOutputPath('handler-src'), $result[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('handler-test'), $result[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('handler-spec'), $result[2]);
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
        return __DIR__.'/sample-output/CreateBroadwayHandlerHandlerTest/'.$fileName.'.output';
    }
}
