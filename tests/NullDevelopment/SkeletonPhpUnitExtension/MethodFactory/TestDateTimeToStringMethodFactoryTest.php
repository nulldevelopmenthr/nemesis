<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestDateTimeToStringMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestDateTimeToStringMethodFactory
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
