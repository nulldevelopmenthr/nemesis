<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;
use PhpSpec\ObjectBehavior;

class InitializableMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className, ClassName $parentName, InterfaceName $interfaceName1)
    {
        $this->beConstructedWith($className, $parentName, [$interfaceName1]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InitializableMethod::class);
        $this->shouldImplement(Method::class);
    }

    public function it_exposes_class_name(ClassName $className)
    {
        $this->getClassName()->shouldReturn($className);
    }

    public function it_exposes_parent_class_name(ClassName $parentName)
    {
        $this->getParentName()->shouldReturn($parentName);
    }

    public function it_exposes_interfaces(InterfaceName $interfaceName1)
    {
        $this->getInterfaces()->shouldReturn([$interfaceName1]);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('it_is_initializable');
    }

    public function it_has_no_parameters()
    {
        $this->getParameters()->shouldReturn([]);
    }
}
