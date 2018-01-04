<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\PhpStructure\Type\ClassDefinition;
use NullDevelopment\Skeleton\SourceCode;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\CommandHandler;
use NullDevelopment\SkeletonSourceCodeExtension\Method\ConstructorMethod;
use NullDevelopment\SkeletonSourceCodeExtension\Method\GetterMethod;
use PhpSpec\ObjectBehavior;

class CommandHandlerSpec extends ObjectBehavior
{
    public function let(
        ClassName $name,
        ClassName $parent,
        InterfaceName $interfaceName1,
        TraitName $traitName1,
        Constant $constant1,
        Property $property1,
        ConstructorMethod $constructorMethod,
        GetterMethod $getterMethod1,
        ClassName $model,
        ClassName $modelId
    ) {
        $this->beConstructedWith(
            $name,
            $parent,
            [$interfaceName1],
            [$traitName1],
            [$constant1],
            [$property1],
            [$constructorMethod, $getterMethod1],
            $model,
            $modelId
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CommandHandler::class);
        $this->shouldHaveType(ClassDefinition::class);
        $this->shouldImplement(SourceCode::class);
    }
}
