<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestGetterMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestGetterMethodFactory
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
