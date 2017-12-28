<?php

declare(strict_types=1);

namespace tests\Nesto\Domain;

use Broadway\EventHandling\EventBus;
use Broadway\EventStore\EventStore;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Nesto\Domain\MiroRepository;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Nesto\Domain\MiroRepository
 * @group todo
 */
class MiroRepositoryTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MiroRepository */
    private $miroRepository;

    public function setUp()
    {
        $this->eventStore            = Mockery::mock(EventStore::class);
        $this->eventBus              = Mockery::mock(EventBus::class);
        $this->eventStreamDecorators = [];
        $this->miroRepository        = new MiroRepository($this->eventStore, $this->eventBus, $this->eventStreamDecorators);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
