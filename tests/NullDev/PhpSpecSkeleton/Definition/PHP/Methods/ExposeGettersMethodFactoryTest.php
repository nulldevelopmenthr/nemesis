<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\Definition\PHP\Methods\ExposeGettersMethodFactory
 * @group  todo
 */
class ExposeGettersMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ExposeGettersMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new ExposeGettersMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }
}
