<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestSerializeMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestSerializeMethodFactory
 * @group  todo
 */
class TestSerializeMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestSerializeMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestSerializeMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromSerializeMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
