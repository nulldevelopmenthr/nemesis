<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\CsFixer;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\CsFixer\CsFixerMiddleware;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\CsFixer\CsFixerMiddleware
 * @group  todo
 */
class CsFixerMiddlewareTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var CsFixerMiddleware */
    private $sut;

    public function setUp()
    {
        $this->sut = new CsFixerMiddleware();
    }

    public function testExecute()
    {
        $this->markTestSkipped('Skipping');
    }
}
