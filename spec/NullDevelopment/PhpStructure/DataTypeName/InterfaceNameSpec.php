<?php

declare(strict_types=1);

namespace spec\NullDevelopment\PhpStructure\DataTypeName;

use NullDevelopment\PhpStructure\DataTypeName\ContractName;
use NullDevelopment\PhpStructure\DataTypeName\Importable;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use PhpSpec\ObjectBehavior;

class InterfaceNameSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith($className = 'Money', $namespace = 'MyMoney');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InterfaceName::class);
        $this->shouldImplement(ContractName::class);
        $this->shouldImplement(Importable::class);
    }

    public function it_will_expose_class_name()
    {
        $this->getName()->shouldReturn('Money');
    }

    public function it_will_expose_namespace()
    {
        $this->getNamespace()->shouldReturn('MyMoney');
    }

    public function it_will_expose_full_class_name()
    {
        $this->getFullName()->shouldReturn('MyMoney\Money');
    }
}
