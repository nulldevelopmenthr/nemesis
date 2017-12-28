<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestDateTimeToStringMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestDateTimeToStringMethodFactory
 * @group  todo
 */
class TestDateTimeToStringMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var TestDateTimeToStringMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestDateTimeToStringMethodFactory();
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
