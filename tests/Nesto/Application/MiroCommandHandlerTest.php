<?php

declare(strict_types=1);

namespace tests\Nesto\Application;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use Nesto\Application\MiroCommandHandler;
use Nesto\Domain\MiroRepository;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Nesto\Application\MiroCommandHandler
 * @group todo
 */
class MiroCommandHandlerTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|MiroRepository */
    private $repository;
    /** @var MiroCommandHandler */
    private $miroCommandHandler;

    public function setUp()
    {
        $this->repository         = Mockery::mock(MiroRepository::class);
        $this->miroCommandHandler = new MiroCommandHandler($this->repository);
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
