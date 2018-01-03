<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator\DateTimeCreateFromFormatMethodGenerator;
use PhpSpec\ObjectBehavior;

class DateTimeCreateFromFormatMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeCreateFromFormatMethodGenerator::class);
    }
}
