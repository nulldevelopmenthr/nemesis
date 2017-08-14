<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\Skeleton\TacticianMiddlewareRegistrationCompilerPass;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\Skeleton\TacticianMiddlewareRegistrationCompilerPass
 * @group  todo
 */
class TacticianMiddlewareRegistrationCompilerPassTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TacticianMiddlewareRegistrationCompilerPass */
    private $tacticianMiddlewareRegistrationCompilerPass;

    public function setUp()
    {
        $this->tacticianMiddlewareRegistrationCompilerPass = new TacticianMiddlewareRegistrationCompilerPass();
    }

    public function testProcess()
    {
        $this->markTestSkipped('Skipping');
    }
}
