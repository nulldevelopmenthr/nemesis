<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton;

use NullDev\Skeleton\PHPParserMethodCompilerPass;
use PhpSpec\ObjectBehavior;

class PHPParserMethodCompilerPassSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PHPParserMethodCompilerPass::class);
    }
}
