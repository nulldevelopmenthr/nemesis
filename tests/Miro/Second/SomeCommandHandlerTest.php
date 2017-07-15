<?php

declare(strict_types=1);

namespace tests\Miro\Second;

use Miro\Second\SomeCommandHandler;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Miro\Second\SomeCommandHandler
 * @group nemesis
 */
class SomeCommandHandlerTest extends PHPUnit_Framework_TestCase
{
    /** @var SomeCommandHandler */
    private $someCommandHandler;

    public function setUp(): void
    {
        $this->someCommandHandler = new SomeCommandHandler();
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
