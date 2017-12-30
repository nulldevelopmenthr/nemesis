<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeDeserializeMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodFactory\SpecDateTimeDeserializeMethodFactory
 * @group  todo
 */
class SpecDateTimeDeserializeMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecDateTimeDeserializeMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SpecDateTimeDeserializeMethodFactory();
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
