<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeSerializeMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeSerializeMethodFactory
 * @group  todo
 */
class SpecDateTimeSerializeMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SpecDateTimeSerializeMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeSerializeMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromDateTimeSerializeMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
