<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayModel;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayModelHandler;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use tests\NullDev\AssertOutputTrait;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\CreateBroadwayModelHandler
 * @group  nemesis
 */
class CreateBroadwayModelHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var CreateBroadwayModelHandler */
    private $handler;

    public function setUp(): void
    {
        $this->handler = $this->getService(CreateBroadwayModelHandler::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(string $className): void
    {
        $modelIdClassType    = ClassType::createFromFullyQualified($className.'Id');
        $modelClassType      = ClassType::createFromFullyQualified($className.'Model');
        $repositoryClassType = ClassType::createFromFullyQualified($className.'Repository');

        $command = new CreateBroadwayModel($modelIdClassType, $modelClassType, $repositoryClassType);

        $sources = $this->handler->handle($command);

        self::assertCount(9, $sources);

        $this->assertOutputMatches($this->getExpectedOutputPath('id-src'), $sources[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('model-src'), $sources[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-src'), $sources[2]);
        $this->assertOutputMatches($this->getExpectedOutputPath('id-spec'), $sources[3]);
        $this->assertOutputMatches($this->getExpectedOutputPath('model-spec'), $sources[4]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-spec'), $sources[5]);
        $this->assertOutputMatches($this->getExpectedOutputPath('id-test'), $sources[6]);
        $this->assertOutputMatches($this->getExpectedOutputPath('model-test'), $sources[7]);
        $this->assertOutputMatches($this->getExpectedOutputPath('repository-test'), $sources[8]);
    }

    public function provideData(): array
    {
        return [
            [
                'Something\User',
            ],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/CreateBroadwayModelHandlerTest/'.$fileName.'.output';
    }
}
