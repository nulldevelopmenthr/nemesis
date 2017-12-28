<?php

declare(strict_types=1);

namespace Tests\NullDev\PhpSpecSkeleton;

use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use NullDev\PhpSpecSkeleton\PhpSpecMiddleware;
use NullDev\PhpSpecSkeleton\SpecGenerator;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\PhpSpecMiddleware
 * @group  todo
 */
class PhpSpecMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var MockInterface|SpecGenerator */
    private $specGenerator;
    /** @var PhpSpecMiddleware */
    private $sut;

    public function setUp()
    {
        $this->specGenerator = Mockery::mock(SpecGenerator::class);
        $this->sut           = new PhpSpecMiddleware($this->specGenerator);
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
