<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\Skeleton\SourceCode\MethodGenerator\DateTimeSerializeMethodGenerator;
use PhpSpec\ObjectBehavior;

class DateTimeSerializeMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeSerializeMethodGenerator::class);
    }
}
