<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpUnitExtension\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestDateTimeCreateFromFormatMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpUnitExtension\MethodFactory\TestDateTimeCreateFromFormatMethodFactory
 * @group  todo
 */
class TestDateTimeCreateFromFormatMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var TestDateTimeCreateFromFormatMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new TestDateTimeCreateFromFormatMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromDateTimeCreateFromFormatMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
