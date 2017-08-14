<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\PhpSpecSkeleton\PhpSpecMiddleware;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\PhpSpecMiddleware
 * @group  todo
 */
class PhpSpecMiddlewareTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|SpecGenerator */
    private $specGenerator;
    /** @var PhpSpecMiddleware */
    private $phpSpecMiddleware;

    public function setUp()
    {
        $this->specGenerator     = Mockery::mock(SpecGenerator::class);
        $this->phpSpecMiddleware = new PhpSpecMiddleware($this->specGenerator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
