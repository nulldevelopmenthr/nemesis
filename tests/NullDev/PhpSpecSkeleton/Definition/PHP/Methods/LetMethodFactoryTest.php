<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethodFactory
 * @group  todo
 */
class LetMethodFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var LetMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new LetMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }
}
