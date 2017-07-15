<?php

declare(strict_types=1);

namespace spec\Miro\First;

use Miro\First\Currency;
use PhpSpec\ObjectBehavior;

class CurrencySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('name');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Currency::class);
    }
}
