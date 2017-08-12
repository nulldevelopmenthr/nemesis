<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayElasticSearchRead;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayElasticSearchReadHandler;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use tests\NullDev\AssertOutputTrait;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\CreateBroadwayElasticSearchReadHandler
 * @group  nemesis
 */
class CreateBroadwayElasticSearchReadHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var CreateBroadwayElasticSearchReadHandler */
    private $handler;

    public function setUp(): void
    {
        $this->handler = $this->getService(CreateBroadwayElasticSearchReadHandler::class);
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

        $sources = $this->handler->handle($command);

        self::assertCount(9, $sources);

        $this->assertOutputMatches($this->getExpectedOutputPath('entity-src'), $sources[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-src'), $sources[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-src'), $sources[2]);
        $this->assertOutputMatches($this->getExpectedOutputPath('entity-spec'), $sources[3]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-spec'), $sources[4]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-spec'), $sources[5]);
        $this->assertOutputMatches($this->getExpectedOutputPath('entity-test'), $sources[6]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-test'), $sources[7]);
        $this->assertOutputMatches($this->getExpectedOutputPath('projector-test'), $sources[8]);
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
        return __DIR__.'/sample-data/CreateBroadwayElasticSearchReadHandlerTest/'.$fileName.'.output';
    }
}
