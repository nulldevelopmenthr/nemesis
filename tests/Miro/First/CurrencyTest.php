<?php

declare(strict_types=1);

namespace tests\Miro\First;

use Miro\First\Currency;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Miro\First\Currency
 * @group nemesis
 */
class CurrencyTest extends PHPUnit_Framework_TestCase
{
    /** @var Currency */
    private $currency;

    public function setUp(): void
    {
        $this->currency = new Currency('code');
    }

    public function testNothing(): void
    {
        $this->markTestIncomplete('Auto generated using nemesis');
    }
}
