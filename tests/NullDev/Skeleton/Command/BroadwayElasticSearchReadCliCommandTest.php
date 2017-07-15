<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\Command;

use NullDev\Skeleton\Command\BroadwayElasticSearchReadCliCommand;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\Command\BroadwayElasticSearchReadCliCommand
 * @group nemesis
 */
class BroadwayElasticSearchReadCliCommandTest extends PHPUnit_Framework_TestCase
{
    /** @var BroadwayElasticSearchReadCliCommand */
    private $broadwayElasticSearchReadCliCommand;

    public function setUp(): void
    {
        $this->broadwayElasticSearchReadCliCommand = new BroadwayElasticSearchReadCliCommand('name');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
