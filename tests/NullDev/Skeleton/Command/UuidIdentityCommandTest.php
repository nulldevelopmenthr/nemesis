<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Command;

use NullDev\Skeleton\Command\UuidIdentityCommand;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Command\UuidIdentityCommand
 * @group nemesis
 */
class UuidIdentityCommandTest extends PHPUnit_Framework_TestCase
{
    /** @var UuidIdentityCommand */
    private $uuidIdentityCommand;

    public function setUp(): void
    {
        $this->uuidIdentityCommand = new UuidIdentityCommand('name');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
