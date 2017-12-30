<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeLetMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeLetMethodFactory
 * @group  todo
 */
class SpecDateTimeLetMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecDateTimeLetMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeLetMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }

    public function testCreateFromConstructorMethod()
    {
        $this->markTestSkipped('Skipping');
    }
}
