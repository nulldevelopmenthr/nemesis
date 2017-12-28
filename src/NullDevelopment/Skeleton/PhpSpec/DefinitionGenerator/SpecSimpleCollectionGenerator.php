<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecSimpleCollection;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

/**
 * @see SpecSimpleCollectionGeneratorSpec
 * @see SpecSimpleCollectionGeneratorTest
 */
class SpecSimpleCollectionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SpecSimpleCollection) {
            return true;
        }

        return false;
    }

    public function generateAsString(Definition $definition): string
    {
        $code = $this->generate($definition);

        return $code->__toString();
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function generate(Definition $definition): PhpNamespace
    {
        if (null === $definition->getNamespace()) {
            $namespace = new PhpNamespace('');
        } else {
            $namespace = new PhpNamespace($definition->getNamespace());
        }

        $code = $namespace->addClass($definition->getClassName());

        if (true === $definition->hasParent()) {
            $code->setExtends($definition->getParentFullClassName());
            $namespace->addUse($definition->getParentFullClassName());
        }

        foreach ($definition->getInterfaces() as $interface) {
            $code->addImplement($interface->getFullName());
            $namespace->addUse($interface->getFullName());
        }

        foreach ($definition->getProperties() as $property) {
            $propertyCode = $code->addProperty($property->getName())
                ->setVisibility((string) $property->getVisibility());

            if (true === $property->hasDefaultValue()) {
                $propertyCode->setValue($property->getDefaultValue());
            }
            if (true === $property->isNullable()) {
                $propertyCode->addComment(sprintf('@var %s|null', $property->getInstanceNameAsString()));
            } else {
                $propertyCode->addComment(sprintf('@var %s', $property->getInstanceNameAsString()));
            }

            if (true === $property->isObject()) {
                $namespace->addUse($property->getInstanceFullName());
            }
        }

        $variableName = lcfirst($definition->getCollectionOf()->getClassName()->getName());
        $variableType = $definition->getCollectionOf()->getClassName()->getFullName();

        $idName   = lcfirst($definition->getCollectionOf()->getHas()->getName());
        $idType   = $definition->getCollectionOf()->getHas()->getFullName();
        $accessor = $definition->getCollectionOf()->getAccessor();

        // Let
        $letMethod = $code->addMethod('let')
                ->setVisibility(Visibility::PUBLIC)
                ->addBody(sprintf('$this->beConstructedWith($elements = [$%s]);', $variableName));

        $letMethod->addParameter($variableName)
                ->setTypeHint($variableType);

        $namespace->addUse($variableType);
        $namespace->addUse($idType);

        // Initializable
        $code->addMethod('it_is_initializable')
                ->addBody('$this->shouldHaveType('.$definition->getSubjectUnderTest()->getName().'::class);');

        $namespace->addUse($definition->getSubjectUnderTest()->getFullName());

        // Exposes elements
        $toArrayMethod = $code->addMethod('it_exposes_elements')
                ->setVisibility(Visibility::PUBLIC)
                ->addBody(sprintf('$this->toArray()->shouldReturn([$%s]);', $variableName));

        $toArrayMethod->addParameter($variableName)
                ->setTypeHint($variableType);

        // Count
        $code->addMethod('it_exposes_number_of_elements_in_collection')->addBody('$this->count()->shouldReturn(1);');

        // Add
        $addMethod = $code->addMethod('it_supports_add_new_element')
                ->addBody(sprintf('$this->add($%s);', 'another'.ucfirst($variableName)))
                ->addBody('$this->count()->shouldReturn(2);');

        $addMethod->addParameter('another'.ucfirst($variableName))->setTypeHint($variableType);

        // Has
        $hasMethod = $code->addMethod('it_knows_if_element_is_in_collection')
                ->addBody(sprintf('$%s->%s()->shouldBeCalled()->willReturn($%s);', $variableName, $accessor, $idName))
                ->addBody(sprintf('$this->has($%s)->shouldReturn(true);', $idName));

        $hasMethod->addParameter($variableName)->setTypeHint($variableType);
        $hasMethod->addParameter($idName)->setTypeHint($idType);

        // Get
        $getMethod = $code->addMethod('it_can_return_element_from_collection_by_given_id')
                ->addBody(sprintf('$%s->%s()->shouldBeCalled()->willReturn($%s);', $variableName, $accessor, $idName))
                ->addBody(sprintf('$this->get($%s)->shouldReturn($%s);', $idName, $variableName));

        $getMethod->addParameter($variableName)
                ->setTypeHint($variableType);
        $getMethod->addParameter($idName)
                ->setTypeHint($idType);

        return $namespace;
    }
}
