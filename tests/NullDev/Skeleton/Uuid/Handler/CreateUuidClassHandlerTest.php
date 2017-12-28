<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\Uuid\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use NullDev\Skeleton\Uuid\Handler\CreateUuidClassHandler;
use Tests\NullDev\AssertOutputTrait;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\Skeleton\Uuid\Handler\CreateUuidClassHandler
 * @group  nemesis
 */
class CreateUuidClassHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var CreateUuidClassHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(CreateUuidClassHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    public function testSourcesWillMatchExpectedOutput(): void
    {
        $command = new CreateUuidClass(ClassType::createFromFullyQualified('Something\CreateUserCommand'));

        $result = $this->commandBus->handle($command);

        self::assertCount(3, $result);

        $this->assertOutputMatches2($this->getExpectedOutputPath('uuid4-src'), $result[0]);
        $this->assertOutputMatches2($this->getExpectedOutputPath('uuid4-test'), $result[1]);
        $this->assertOutputMatches2($this->getExpectedOutputPath('uuid4-spec'), $result[2]);
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/'.$fileName.'.output';
    }
}
