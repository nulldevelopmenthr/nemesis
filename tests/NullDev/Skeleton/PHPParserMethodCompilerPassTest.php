<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\PHPParserMethodCompilerPass;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\PHPParserMethodCompilerPass
 * @group  todo
 */
class PHPParserMethodCompilerPassTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var PHPParserMethodCompilerPass */
    private $pHPParserMethodCompilerPass;

    public function setUp()
    {
        $this->pHPParserMethodCompilerPass = new PHPParserMethodCompilerPass();
    }

    public function testProcess()
    {
        $this->markTestSkipped('Skipping');
    }
}
