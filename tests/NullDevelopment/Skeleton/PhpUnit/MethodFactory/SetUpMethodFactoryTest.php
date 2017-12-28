<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpUnit\MethodFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\Skeleton\PhpUnit\MethodFactory\SetUpMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpUnit\MethodFactory\SetUpMethodFactory
 * @group  todo
 */
class SetUpMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var SetUpMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SetUpMethodFactory();
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
