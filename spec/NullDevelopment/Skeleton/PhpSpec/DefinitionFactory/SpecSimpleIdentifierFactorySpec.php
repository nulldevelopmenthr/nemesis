<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\DefinitionFactory;

use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleIdentifier;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecSimpleIdentifierFactory;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\GetterSpecMethodFactory;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\InitializableMethodFactory;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\LetMethodFactory;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleIdentifier;
use PhpSpec\ObjectBehavior;

class SpecSimpleIdentifierFactorySpec extends ObjectBehavior
{
    public function let(
        LetMethodFactory $letMethodFactory,
        InitializableMethodFactory $initializableMethodFactory,
        GetterSpecMethodFactory $getterSpecMethodFactory
    ) {
        $this->beConstructedWith([$letMethodFactory, $initializableMethodFactory, $getterSpecMethodFactory]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSimpleIdentifierFactory::class);
    }

    public function it_will_create_specification_for_single_value_object(
        SimpleIdentifier $definition,
        LetMethodFactory $letMethodFactory,
        InitializableMethodFactory $initializableMethodFactory,
        GetterSpecMethodFactory $getterSpecMethodFactory
    ) {
        $definition->getFullClassName()->shouldBeCalled()->willReturn('MyVendor\\UserEntity');

        $letMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $initializableMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);
        $getterSpecMethodFactory->create($definition)->shouldBeCalled()->willReturn([]);

        $result = $this->createFromSimpleIdentifier($definition);
        $result->shouldReturnAnInstanceOf(SpecSimpleIdentifier::class);

        $result->getFullClassName()->shouldReturn('spec\\MyVendor\\UserEntitySpec');
        $result->getParentFullClassName()->shouldReturn('PhpSpec\\ObjectBehavior');
        $result->getInterfaces()->shouldReturn([]);
        $result->getTraits()->shouldReturn([]);
        $result->getProperties()->shouldReturn([]);
        $result->getMethods()->shouldReturn([]);
    }
}
