<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\Skeleton\SourceCode\MethodGenerator\DateTimeToStringMethodGenerator;
use PhpSpec\ObjectBehavior;

class DateTimeToStringMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeToStringMethodGenerator::class);
    }
}
