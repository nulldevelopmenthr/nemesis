<?php

declare(strict_types=1);

namespace spec\Miro\First;

use Miro\First\Currency;
use Miro\First\Money;
use PhpSpec\ObjectBehavior;

class MoneySpec extends ObjectBehavior
{
    public function let(Currency $currency)
    {
        $this->beConstructedWith(3400, $currency);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Money::class);
    }
}
