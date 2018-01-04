<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\PHPUnitTestMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\Skeleton\PHPUnitTestMiddleware
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
