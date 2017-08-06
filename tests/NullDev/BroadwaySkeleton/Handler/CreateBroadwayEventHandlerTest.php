<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayEvent;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayEventHandler;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use tests\NullDev\AssertOutputTrait;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\CreateBroadwayEventHandler
 * @group  nemesis
 */
class CreateBroadwayEventHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var CreateBroadwayEventHandler */
    private $handler;

    public function setUp(): void
    {
        $this->handler = $this->getService(CreateBroadwayEventHandler::class);
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

        $sources = $this->handler->handle($command);

        self::assertCount(3, $sources);

        $this->assertOutputMatches($this->getExpectedOutputPath($folderName.'/event-src'), $sources[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath($folderName.'/event-spec'), $sources[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath($folderName.'/event-test'), $sources[2]);
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
                    new Parameter('name', new StringType()),
                    new Parameter('age', new IntType()),
                    new Parameter('height', new FloatType()),
                    new Parameter('about'),
                    new Parameter('company', ClassType::createFromFullyQualified('Something\Company')),
                ],
                'mix-params',
            ],
        ];
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-data/CreateBroadwayEventHandlerTest/'.$fileName.'.output';
    }
}
