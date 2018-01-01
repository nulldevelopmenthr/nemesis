<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecSimpleCollection;

/**
 * @see SpecSimpleCollectionGeneratorSpec
 * @see SpecSimpleCollectionGeneratorTest
 */
class SpecSimpleCollectionGenerator extends BaseSpecDefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecSimpleCollection) {
            return true;
        }

        return false;
    }

    protected function processMethods(PhpNamespace $namespace, ClassType $netteCode, Definition $definition): void
    {
        $variableName = lcfirst($definition->getCollectionOf()->getClassName()->getName());
        $variableType = $definition->getCollectionOf()->getClassName()->getFullName();

        $idName   = lcfirst($definition->getCollectionOf()->getHas()->getName());
        $idType   = $definition->getCollectionOf()->getHas()->getFullName();
        $accessor = $definition->getCollectionOf()->getAccessor();

        // Let
        $letMethod = $netteCode->addMethod('let')
            ->setVisibility(Visibility::PUBLIC)
            ->addBody(sprintf('$this->beConstructedWith($elements = [$%s]);', $variableName));

        $letMethod->addParameter($variableName)
            ->setTypeHint($variableType);

        $namespace->addUse($variableType);
        $namespace->addUse($idType);

        // Initializable
        $netteCode->addMethod('it_is_initializable')
            ->addBody('$this->shouldHaveType('.$definition->getSubjectUnderTest()->getName().'::class);');

        $namespace->addUse($definition->getSubjectUnderTest()->getFullName());

        // Exposes elements
        $toArrayMethod = $netteCode
            ->addMethod('it_exposes_elements')
            ->setVisibility(Visibility::PUBLIC)
            ->addBody(sprintf('$this->toArray()->shouldReturn([$%s]);', $variableName));

        $toArrayMethod->addParameter($variableName)
            ->setTypeHint($variableType);

        // Count
        $netteCode->addMethod('it_exposes_number_of_elements_in_collection')
            ->addBody('$this->count()->shouldReturn(1);');

        // Add
        $addMethod = $netteCode
            ->addMethod('it_supports_add_new_element')
            ->addBody(sprintf('$this->add($%s);', 'another'.ucfirst($variableName)))
            ->addBody('$this->count()->shouldReturn(2);');

        $addMethod->addParameter('another'.ucfirst($variableName))
            ->setTypeHint($variableType);

        // Has
        $hasMethod = $netteCode
            ->addMethod('it_knows_if_element_is_in_collection')
            ->addBody(sprintf('$%s->%s()->shouldBeCalled()->willReturn($%s);', $variableName, $accessor, $idName))
            ->addBody(sprintf('$this->has($%s)->shouldReturn(true);', $idName));

        $hasMethod->addParameter($variableName)->setTypeHint($variableType);
        $hasMethod->addParameter($idName)->setTypeHint($idType);

        // Get
        $getMethod = $netteCode
            ->addMethod('it_can_return_element_from_collection_by_given_id')
            ->addBody(sprintf('$%s->%s()->shouldBeCalled()->willReturn($%s);', $variableName, $accessor, $idName))
            ->addBody(sprintf('$this->get($%s)->shouldReturn($%s);', $idName, $variableName));

        $getMethod->addParameter($variableName)
            ->setTypeHint($variableType);
        $getMethod->addParameter($idName)
            ->setTypeHint($idType);
    }
}
