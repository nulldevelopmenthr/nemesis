<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestDateTimeDeserializeMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestDateTimeDeserializeMethodFactory
 * @group  todo
 */
class TestDateTimeDeserializeMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var TestDateTimeDeserializeMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestDateTimeDeserializeMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromDateTimeDeserializeMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
