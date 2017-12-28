<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see SimpleCollectionGeneratorSpec
 * @see SimpleCollectionGeneratorTest
 */
class SimpleCollectionGenerator implements DefinitionGenerator
{
    public function supports(Definition $definition): bool
    {
        if ($definition instanceof SimpleCollection) {
            return true;
        }

        return false;
    }

    public function handleSimpleCollection(SimpleCollection $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
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

        $namespace->addUse($definition->getCollectionOf()->getClassName()->getFullName());
        $namespace->addUse($definition->getCollectionOf()->getHas()->getFullName());
        $namespace->addUse('Webmozart\Assert\Assert');

        $collectionOf=$definition->getCollectionOf()->getClassName()->getName();

        $constructorMethod = $code->addMethod('__construct')
                ->setVisibility(Visibility::PUBLIC);

        $constructorMethod->addBody(
                sprintf('Assert::allIsInstanceOf($elements, %s::class);', $collectionOf)
            );
        $constructorMethod->addComment(sprintf('@param %s[] $elements', $collectionOf));

        /** @var MethodParameter $parameter */
        foreach ($definition->getConstructorParameters() as $parameter) {
            $assign = sprintf('$this->%s = $%s;', $parameter->getName(), $parameter->getName());
            $constructorMethod->addBody($assign);

            $constructorMethod->addParameter($parameter->getName())
                ->setTypeHint($parameter->getInstanceFullName())
                ->setDefaultValue([]);

            $property = $code->addProperty($parameter->getName())
                ->setVisibility(Visibility::PRIVATE);

            $property->addComment('@var '.$parameter->getInstanceName()->getName().'|'.$collectionOf.'[]');
        }

        $addMethod = $code->addMethod('add')
                ->addBody('$this->elements[] = $element;');

        $addMethod->addParameter('element')
                ->setTypeHint($definition->getCollectionOf()->getClassName()->getFullName());

        $hasMethod = $code->addMethod('has')
                ->setReturnType('bool')
                ->addBody('foreach ($this->elements as $element) {')
                ->addBody(sprintf('    if ($element->%s() == $id) {', $definition->getCollectionOf()->getAccessor()))
                ->addBody('        return true;')
                ->addBody('    }')
                ->addBody('}')
                ->addBody('return false;');

        $hasMethod->addParameter('id')
                ->setTypeHint($definition->getCollectionOf()->getHas()->getFullName());

        $getMethod = $code->addMethod('get')
                ->addBody('foreach ($this->elements as $element) {')
                ->addBody(sprintf('    if ($element->%s() == $id) {', $definition->getCollectionOf()->getAccessor()))
                ->addBody('        return $element;')
                ->addBody('    }')
                ->addBody('}')
                ->addBody('return null;');

        $getMethod->addParameter('id')
                ->setTypeHint($definition->getCollectionOf()->getHas()->getFullName());

        $code->addMethod('toArray')->setReturnType('array')->addBody('return $this->elements;');

        $code->addMethod('count')->setReturnType('int')->addBody('return count($this->elements);');

        ///
        $serializeMethod = $code->addMethod('serialize')
                ->setReturnType('array');

        $serializeMethod->addBody('$data = [];');
        $serializeMethod->addBody('foreach ($this->elements as $element) {');
        $serializeMethod->addBody('    $data[] = $element->serialize();');
        $serializeMethod->addBody('}');
        $serializeMethod->addBody('return $data;');

        ///
        $deserializeMethod = $code->addMethod('deserialize')->setStatic(true)->setReturnType('self');

        $deserializeMethod->addParameter('data')
                ->setTypeHint('array');

        $deserializeMethod->addBody('$elements = [];');
        $deserializeMethod->addBody('foreach ($data as $item) {');
        $deserializeMethod->addBody(sprintf('    $elements[] = %s::deserialize($item);', $collectionOf));
        $deserializeMethod->addBody('}');
        $deserializeMethod->addBody('return new self($elements);');

        return $namespace;
    }
}
