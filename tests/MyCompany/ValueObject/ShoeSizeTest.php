<?php

declare(strict_types=1);

namespace Tests\MyCompany\ValueObject;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use MyCompany\ValueObject\ShoeSize;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MyCompany\ValueObject\ShoeSize
 * @group  todo
 */
class ShoeSizeTest extends TestCase
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
