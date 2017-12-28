<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeToStringMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeToStringMethodFactory
 * @group  todo
 */
class SpecDateTimeToStringMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecDateTimeToStringMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeToStringMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromDateTimeToStringMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
