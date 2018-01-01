<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\MethodGenerator;

use NullDevelopment\Skeleton\SourceCode\MethodGenerator\HasPropertyMethodGenerator;
use PhpSpec\ObjectBehavior;

class HasPropertyMethodGeneratorSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(HasPropertyMethodGenerator::class);
    }
}
