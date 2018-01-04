<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec;

use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandler;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandlerFactory;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;
use Tests\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\CommandHandlerFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\CommandHandler\PhpSpec\SpecCommandHandlerFactory
 * @group  integration
 */
class SpecCommandHandlerFactoryTest extends SfTestCase
{
    /** @var SpecCommandHandlerFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecCommandHandlerFactory::class);
    }

    /** @dataProvider provideCommandHandlers */
    public function testCreateFromCommandHandler(CommandHandler $command, SpecCommandHandler $expected)
    {
        self::assertEquals($expected, $this->sut->createFromCommandHandler($command));
    }

    public function provideCommandHandlers(): array
    {
        return [
            [CommandHandlerFixtures::actorEntity(), CommandHandlerFixtures::specActorEntity()],
        ];
    }
}
