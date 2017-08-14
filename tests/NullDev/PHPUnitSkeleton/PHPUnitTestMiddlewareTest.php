<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestMiddleware;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\PHPUnitTestMiddleware
 * @group  todo
 */
class PHPUnitTestMiddlewareTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|PHPUnitTestGenerator */
    private $testGenerator;
    /** @var PHPUnitTestMiddleware */
    private $pHPUnitTestMiddleware;

    public function setUp()
    {
        $this->testGenerator         = Mockery::mock(PHPUnitTestGenerator::class);
        $this->pHPUnitTestMiddleware = new PHPUnitTestMiddleware($this->testGenerator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
