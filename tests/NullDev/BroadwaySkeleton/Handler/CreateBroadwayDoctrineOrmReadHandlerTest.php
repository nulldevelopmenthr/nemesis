<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayDoctrineOrmRead;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayDoctrineOrmReadHandler;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use tests\NullDev\AssertOutputTrait;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\CreateBroadwayDoctrineOrmReadHandler
 * @group  nemesis
 */
class CreateBroadwayDoctrineOrmReadHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var CreateBroadwayDoctrineOrmReadHandler */
    private $handler;

    public function setUp(): void
    {
        $this->handler = $this->getService(CreateBroadwayDoctrineOrmReadHandler::class);
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

        $sources = $this->handler->handle($command);

        self::assertCount(12, $sources);

        $this->assertOutputMatches($this->getExpectedOutputPath('entity-src'), $sources[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-src'), $sources[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('factory-src'), $sources[2]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-src'), $sources[3]);
        $this->assertOutputMatches($this->getExpectedOutputPath('entity-spec'), $sources[4]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-spec'), $sources[5]);
        $this->assertOutputMatches($this->getExpectedOutputPath('factory-spec'), $sources[6]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-spec'), $sources[7]);
        $this->assertOutputMatches($this->getExpectedOutputPath('entity-test'), $sources[8]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-test'), $sources[9]);
        $this->assertOutputMatches($this->getExpectedOutputPath('factory-test'), $sources[10]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-test'), $sources[11]);
    }

    public function provideData(): array
    {
        return [
            [
                'Something\User',
                [
                    new Parameter('id', ClassType::createFromFullyQualified('Something\UserId')),
                ],
            ],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/CreateBroadwayDoctrineOrmReadHandlerTest/'.$fileName.'.output';
    }
}
