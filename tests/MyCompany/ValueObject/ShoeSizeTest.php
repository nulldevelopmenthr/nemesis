<?php

declare(strict_types=1);

namespace tests\MyCompany\ValueObject;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use MyCompany\ValueObject\ShoeSize;
use PHPUnit_Framework_TestCase;

/**
 * @covers \MyCompany\ValueObject\ShoeSize
 * @group  todo
 */
class ShoeSizeTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var int */
    private $value;
    /** @var ShoeSize */
    private $shoeSize;

    public function setUp()
    {
        $this->value    = 1;
        $this->shoeSize = new ShoeSize($this->value);
    }

    public function testGetValue()
    {
        self::assertEquals($this->value, $this->shoeSize->getValue());
    }
}
