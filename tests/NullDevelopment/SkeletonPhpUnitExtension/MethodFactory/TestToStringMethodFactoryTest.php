<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestToStringMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestToStringMethodFactory
 * @group  todo
 */
class TestToStringMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var TestToStringMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestToStringMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromToStringMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
