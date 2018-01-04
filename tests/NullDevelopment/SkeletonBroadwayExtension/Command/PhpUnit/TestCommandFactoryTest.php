<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit;

use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommand;
use NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommandFactory;
use NullDevelopment\SkeletonBroadwayExtension\Command\SourceCode\Command;
use Tests\NullDevelopment\SkeletonBroadwayExtension\Command\CommandFixtures;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonBroadwayExtension\Command\PhpUnit\TestCommandFactory
 * @group  integration
 */
class TestCommandFactoryTest extends SfTestCase
{
    /** @var TestCommandFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(TestCommandFactory::class);
    }

    /** @dataProvider provideCommands */
    public function testCreateFromCommand(Command $command, TestCommand $expected)
    {
        self::assertEquals($expected, $this->sut->createFromCommand($command));
    }

    public function provideCommands(): array
    {
        return [
            [CommandFixtures::createShowCommand(), CommandFixtures::testCreateShowCommand()],
        ];
    }
}
