<?php

declare(strict_types=1);

namespace spec\Miro\First;

use Miro\First\AhaValueObject;
use PhpSpec\ObjectBehavior;

class AhaValueObjectSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('name', 73);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AhaValueObject::class);
    }
}
