<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\MethodFactory;

use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\SkeletonPhpSpecExtension\MethodFactory\SpecDateTimeLetMethodFactory;
use PhpSpec\ObjectBehavior;

class SpecDateTimeLetMethodFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDateTimeLetMethodFactory::class);
    }

    public function it_will_create_let_method(ClassDefinition $definition)
    {
        $this->create($definition)->shouldHaveCount(1);
    }
}
