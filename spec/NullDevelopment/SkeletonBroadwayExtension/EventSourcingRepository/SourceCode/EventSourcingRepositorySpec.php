<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\SourceCode;
use NullDevelopment\Skeleton\SourceCode\Method\ConstructorMethod;
use NullDevelopment\Skeleton\SourceCode\Method\GetterMethod;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcingRepository\SourceCode\EventSourcingRepository;
use PhpSpec\ObjectBehavior;

class EventSourcingRepositorySpec extends ObjectBehavior
{
    public function let(
        ClassName $name,
        ClassName $parent,
        InterfaceName $interfaceName1,
        TraitName $traitName1,
        Constant $constant1,
        Property $property1,
        ConstructorMethod $constructorMethod,
        GetterMethod $getterMethod1
    ) {
        $this->beConstructedWith(
            $name,
            $parent,
            [$interfaceName1],
            [$traitName1],
            [$constant1],
            [$property1],
            [$constructorMethod, $getterMethod1]
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(EventSourcingRepository::class);
        $this->shouldHaveType(ClassDefinition::class);
        $this->shouldImplement(SourceCode::class);
    }
}
