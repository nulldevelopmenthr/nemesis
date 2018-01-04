<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandler;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandlerFactory;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;
use Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\CommandHandlerFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpUnit\TestCommandHandlerFactory
 * @group  integration
 */
class TestCommandHandlerFactoryTest extends SfTestCase
{
    /** @var TestCommandHandlerFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestCommandHandlerFactory::class);
    }

    /** @dataProvider provideCommandHandlers */
    public function testCreateFromCommandHandler(CommandHandler $command, TestCommandHandler $expected)
    {
        self::assertEquals($expected, $this->sut->createFromCommandHandler($command));
    }

    public function provideCommandHandlers(): array
    {
        return [
            [CommandHandlerFixtures::actorEntity(), CommandHandlerFixtures::testActorEntity()],
        ];
    }
}
