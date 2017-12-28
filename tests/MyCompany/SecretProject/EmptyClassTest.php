<?php

declare(strict_types=1);

namespace Tests\MyCompany\SecretProject;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use MyCompany\SecretProject\EmptyClass;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyCompany\SecretProject\EmptyClass
 * @group  todo
 */
class EmptyClassTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var EmptyClass */
    private $emptyClass;

    public function setUp()
    {
        $this->emptyClass = new EmptyClass();
    }

    public function testNothing()
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
