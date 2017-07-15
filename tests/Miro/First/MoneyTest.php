<?php

declare(strict_types=1);

namespace tests\Miro\First;

use Miro\First\Currency;
use Miro\First\Money;
use Mockery;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Miro\First\Money
 * @group nemesis
 */
class MoneyTest extends PHPUnit_Framework_TestCase
{
    /** @var Money */
    private $money;

    public function setUp(): void
    {
        $this->money = new Money(1, Mockery::mock(Currency::class));
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
