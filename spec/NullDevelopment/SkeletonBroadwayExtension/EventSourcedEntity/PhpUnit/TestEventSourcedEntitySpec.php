<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\SkeletonBroadwayExtension\EventSourcedEntity\PhpUnit\TestEventSourcedEntity;
use NullDevelopment\SkeletonPhpUnitExtension\Definition\BaseTestClassDefinition;
use NullDevelopment\SkeletonPhpUnitExtension\Method\SetUpMethod;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitSpecification;
use PhpSpec\ObjectBehavior;

class TestEventSourcedEntitySpec extends ObjectBehavior
{
    public function let(
        ClassName $name,
        ClassName $parent,
        InterfaceName $interfaceName1,
        TraitName $traitName1,
        Constant $constant1,
        Property $property1,
        SetUpMethod $setUpMethod,
        ClassName $subjectUnderTest
    ) {
        $this->beConstructedWith(
            $name,
            $parent,
            [$interfaceName1],
            [$traitName1],
            [$constant1],
            [$property1],
            [$setUpMethod],
            $subjectUnderTest
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestEventSourcedEntity::class);
        $this->shouldHaveType(BaseTestClassDefinition::class);
        $this->shouldImplement(PhpUnitSpecification::class);
    }
}
