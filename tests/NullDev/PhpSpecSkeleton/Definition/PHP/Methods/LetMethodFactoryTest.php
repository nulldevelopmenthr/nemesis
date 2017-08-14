<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\Definition\PHP\Methods;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethodFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\Definition\PHP\Methods\LetMethodFactory
 * @group  todo
 */
class LetMethodFactoryTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var LetMethodFactory */
    private $letMethodFactory;

    public function setUp()
    {
        $this->letMethodFactory = new LetMethodFactory();
    }

    public function testCreate()
    {
        $this->markTestSkipped('Skipping');
    }
}
