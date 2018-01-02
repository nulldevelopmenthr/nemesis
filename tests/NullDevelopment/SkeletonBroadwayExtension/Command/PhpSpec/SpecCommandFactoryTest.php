<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec;

use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommand;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommandFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\Command;
use Tests\NullDevelopment\SkeletonBroadwayExtension\Command\CommandFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Command\PhpSpec\SpecCommandFactory
 * @group  integration
 */
class SpecCommandFactoryTest extends SfTestCase
{
    /** @var SpecCommandFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecCommandFactory::class);
    }

    /**
     * @dataProvider provideCommands
     */
    public function testCreateFromCommand(Command $command, SpecCommand $expected)
    {
        self::assertEquals($expected, $this->sut->createFromCommand($command));
    }

    public function provideCommands(): array
    {
        return [
            [CommandFixtures::createShowCommand(), CommandFixtures::specCreateShowCommand()],
        ];
    }
}
