<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestDateTimeCreateFromFormatMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodFactory\TestDateTimeCreateFromFormatMethodFactory
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
