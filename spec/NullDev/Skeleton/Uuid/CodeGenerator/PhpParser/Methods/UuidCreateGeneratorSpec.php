<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\CodeGenerator\PhpParser\Methods;

use NullDev\Skeleton\Uuid\CodeGenerator\PhpParser\Methods\UuidCreateGenerator;
use PhpParser\BuilderFactory;
use PhpSpec\ObjectBehavior;

class UuidCreateGeneratorSpec extends ObjectBehavior
{
    public function let(BuilderFactory $builderFactory)
    {
        $this->beConstructedWith($builderFactory);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(UuidCreateGenerator::class);
    }
}
