<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestGetterMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestGetterMethodFactory
 * @group  todo
 */
class TestGetterMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var TestGetterMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestGetterMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromGetterMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
