<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestDateTimeSerializeMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestDateTimeSerializeMethodFactory
 * @group  todo
 */
class TestDateTimeSerializeMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestDateTimeSerializeMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestDateTimeSerializeMethodFactory();
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
