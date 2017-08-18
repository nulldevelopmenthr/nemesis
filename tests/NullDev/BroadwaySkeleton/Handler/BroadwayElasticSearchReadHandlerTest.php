<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use League\Tactician\CommandBus;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticSearchRead;
use NullDev\BroadwaySkeleton\Handler\BroadwayElasticSearchReadHandler;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use tests\NullDev\AssertOutputTrait2;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\BroadwayElasticSearchReadHandler
 * @group  nemesis
 */
class BroadwayElasticSearchReadHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait2;

    /** @var BroadwayElasticSearchReadHandler */
    private $handler;
    /** @var CommandBus */
    private $commandBus;

    public function setUp(): void
    {
        $this->handler    = $this->getService(BroadwayElasticSearchReadHandler::class);
        $this->commandBus = $this->getService(CommandBus::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className, array $parameters): void
    {
        $readEntityClassType    = ClassType::createFromFullyQualified($className.'Entity');
        $repositoryClassType    = ClassType::createFromFullyQualified($className.'Repository');
        $readProjectorClassType = ClassType::createFromFullyQualified($className.'Projector');

        $command = new CreateBroadwayElasticSearchRead(
            $readEntityClassType,
            $parameters,
            $repositoryClassType,
            $readProjectorClassType
        );

        $result = $this->commandBus->handle($command);

        self::assertCount(9, $result);

        $this->assertOutputMatches($this->getExpectedOutputPath('entity-src'), $result[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-src'), $result[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-src'), $result[2]);
        $this->assertOutputMatches($this->getExpectedOutputPath('entity-test'), $result[3]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-test'), $result[4]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-test'), $result[5]);
        $this->assertOutputMatches($this->getExpectedOutputPath('entity-spec'), $result[6]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-spec'), $result[7]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-spec'), $result[8]);
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
        return __DIR__.'/sample-output/BroadwayElasticSearchReadHandlerTest/'.$fileName.'.output';
    }
}
