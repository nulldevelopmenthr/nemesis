<?php

declare(strict_types=1);

namespace spec\NullDevelopment\PhpStructure\DataType;

use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Variable;
use NullDevelopment\PhpStructure\DataTypeName\ContractName;
use PhpSpec\ObjectBehavior;

class MethodParameterSpec extends ObjectBehavior
{
    public function let(ContractName $contractName)
    {
        $this->beConstructedWith($name = 'param', $contractName, $nullable = false, $hasDefaultValue = false, $defaultValue = null);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(MethodParameter::class);
        $this->shouldImplement(Variable::class);
    }

    public function it_exposes_name()
    {
        $this->getName()->shouldReturn('param');
    }

    public function it_exposes_instance_name(ContractName $contractName)
    {
        $this->getInstanceName()->shouldReturn($contractName);
    }

    public function it_exposes_instance_full_name(ContractName $contractName)
    {
        $contractName->getFullName()->shouldBeCalled()->willReturn('MyCompany\\WebShop\\User');
        $this->getInstanceFullName()->shouldReturn('MyCompany\\WebShop\\User');
    }

    public function it_knows_if_its_nullable()
    {
        $this->isNullable()->shouldReturn(false);
    }

    public function it_knows_if_it_has_a_default_value()
    {
        $this->hasDefaultValue()->shouldReturn(false);
    }

    public function it_exposes_default_value()
    {
        $this->getDefaultValue()->shouldReturn(null);
    }
}
