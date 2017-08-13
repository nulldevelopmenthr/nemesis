<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Uuid\Handler;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use NullDev\Skeleton\Uuid\Handler\CreateUuidClassHandler;
use tests\NullDev\AssertOutputTrait;
use tests\NullDev\ContainerSupportedTestCase;

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
    /** @var PhpParserGenerator */
    private $generator;

    public function setUp(): void
    {
        $this->handler   = $this->getService(CreateUuidClassHandler::class);
        $this->generator = $this->getService(PhpParserGenerator::class);
    }

    public function testSourcesWillMatchExpectedOutput(): void
    {
        $command = new CreateUuidClass(ClassType::createFromFullyQualified('Something\CreateUserCommand'));

        $sources = $this->handler->handle($command);

        self::assertCount(3, $sources);

        $this->assertOutputMatches($this->getExpectedOutputPath('uuid4-src'), $sources[0]);
        $this->assertOutputMatches($this->getExpectedOutputPath('uuid4-spec'), $sources[1]);
        $this->assertOutputMatches($this->getExpectedOutputPath('uuid4-test'), $sources[2]);
    }

    protected function getExpectedOutputPath(string $fileName): string
    {
        return __DIR__.'/sample-output/'.$fileName.'.output';
    }
}
