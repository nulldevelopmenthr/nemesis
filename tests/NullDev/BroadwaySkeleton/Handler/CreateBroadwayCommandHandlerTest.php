<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\Handler;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\BroadwaySkeleton\Command\CreateBroadwayCommand;
use NullDev\BroadwaySkeleton\Handler\CreateBroadwayCommandHandler;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use tests\NullDev\AssertOutputTrait;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\Handler\CreateBroadwayCommandHandler
 * @group  nemesis
 */
class CreateBroadwayCommandHandlerTest extends ContainerSupportedTestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var CreateBroadwayCommandHandler */
    private $handler;
    /** @var PhpParserGenerator */
    private $generator;

    public function setUp(): void
    {
        $this->handler   = $this->getService(CreateBroadwayCommandHandler::class);
        $this->generator = $this->getService(PhpParserGenerator::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testSourcesWillMatchExpectedOutput(ClassType $classType, array $parameters, string $folderName): void
    {
        $command = new CreateBroadwayCommand($classType, $parameters);

        $sources = $this->handler->handle($command);

        self::assertCount(3, $sources);

        $this->assertOutputMatches($this->getExpectedOutputPath($folderName.'/command-src'), $sources[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath($folderName.'/command-spec'), $sources[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath($folderName.'/command-test'), $sources[2]);
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
        return __DIR__.'/sample-output/CreateBroadwayCommandHandlerTest/'.$fileName.'.output';
    }
}
