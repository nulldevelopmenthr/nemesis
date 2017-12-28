<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\PHPUnitSkeleton\PHPUnitTestMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\PHPUnitTestMiddleware
 * @group  todo
 */
class PHPUnitTestMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|PHPUnitTestGenerator */
    private $testGenerator;
    /** @var PHPUnitTestMiddleware */
    private $sut;

    public function setUp()
    {
        $this->testGenerator = Mockery::mock(PHPUnitTestGenerator::class);
        $this->sut           = new PHPUnitTestMiddleware($this->testGenerator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
