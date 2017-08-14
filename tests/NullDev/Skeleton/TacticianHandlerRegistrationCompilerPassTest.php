<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\TacticianHandlerRegistrationCompilerPass;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\TacticianHandlerRegistrationCompilerPass
 * @group  todo
 */
class TacticianHandlerRegistrationCompilerPassTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TacticianHandlerRegistrationCompilerPass */
    private $tacticianHandlerRegistrationCompilerPass;

    public function setUp()
    {
        $this->tacticianHandlerRegistrationCompilerPass = new TacticianHandlerRegistrationCompilerPass();
    }

    public function testProcess()
    {
        $this->markTestSkipped('Skipping');
    }
}
