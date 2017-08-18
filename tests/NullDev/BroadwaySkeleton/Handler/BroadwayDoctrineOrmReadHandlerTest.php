<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmRead;
use NullDev\BroadwaySkeleton\Handler\BroadwayDoctrineOrmReadHandler;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use tests\NullDev\AssertOutputTrait2;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayDoctrineOrmReadHandler
 * @group  nemesis
 */
class BroadwayDoctrineOrmReadHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait2;

    /** @var BroadwayDoctrineOrmReadHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayDoctrineOrmReadHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className, array $parameters): void
    {
        $readEntityClassType    = ClassType::createFromFullyQualified($className.'Entity');
        $repositoryClassType    = ClassType::createFromFullyQualified($className.'Repository');
        $factoryClassType       = ClassType::createFromFullyQualified($className.'Factory');
        $readProjectorClassType = ClassType::createFromFullyQualified($className.'Projector');

        $command = new CreateBroadwayDoctrineOrmRead(
            $readEntityClassType,
            $parameters,
            $repositoryClassType,
            $factoryClassType,
            $readProjectorClassType
        );

        $result = $this->commandBus->handle($command);

        self::assertCount(12, $result);

        $this->assertOutputMatches($this->getExpectedOutputPath('entity-src'), $result[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-src'), $result[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('factory-src'), $result[2]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-src'), $result[3]);
        $this->assertOutputMatches($this->getExpectedOutputPath('entity-test'), $result[4]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-test'), $result[5]);
        $this->assertOutputMatches($this->getExpectedOutputPath('factory-test'), $result[6]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-test'), $result[7]);
        $this->assertOutputMatches($this->getExpectedOutputPath('entity-spec'), $result[8]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-spec'), $result[9]);
        $this->assertOutputMatches($this->getExpectedOutputPath('factory-spec'), $result[10]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-spec'), $result[11]);
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
        return __DIR__.'/sample-output/BroadwayDoctrineOrmReadHandlerTest/'.$fileName.'.output';
    }
}
