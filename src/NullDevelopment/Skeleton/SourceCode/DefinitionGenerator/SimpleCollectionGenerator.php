<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\Definition\SimpleCollection;
use NullDevelopment\Skeleton\SourceCode\Result;

/**
 * @see SimpleCollectionGeneratorSpec
 * @see SimpleCollectionGeneratorTest
 */
class SimpleCollectionGenerator extends BaseSourceCodeDefinitionGenerator
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

    protected function processMethods(PhpNamespace $namespace, ClassType $netteCode, Definition $definition): void
    {
        $namespace->addUse($definition->getCollectionOf()->getClassName()->getFullName());
        $namespace->addUse($definition->getCollectionOf()->getHas()->getFullName());
        $namespace->addUse('Webmozart\Assert\Assert');

        $this->addConstructorMethod($netteCode, $definition);
        $this->addAddMethod($netteCode, $definition);
        $this->addHasMethod($netteCode, $definition);
        $this->addGetMethod($netteCode, $definition);
        $this->addToArrayMethod($netteCode);
        $this->addCountMethod($netteCode);
        $this->addSerializeMethod($netteCode);
        $this->addDeserializeMethod($netteCode, $definition);
    }

    private function addConstructorMethod(ClassType $netteCode, Definition $definition): void
    {
        $collectionOf = $definition->getCollectionOf()->getClassName()->getName();

        $constructorMethod = $netteCode->addMethod('__construct')
            ->setVisibility(Visibility::PUBLIC)
            ->addBody(sprintf('Assert::allIsInstanceOf($elements, %s::class);', $collectionOf))
            ->addComment(sprintf('@param %s[] $elements', $collectionOf));

        /** @var MethodParameter $parameter */
        foreach ($definition->getConstructorParameters() as $parameter) {
            $assign = sprintf('$this->%s = $%s;', $parameter->getName(), $parameter->getName());
            $constructorMethod->addBody($assign);

            $constructorMethod->addParameter($parameter->getName())
                ->setTypeHint($parameter->getInstanceFullName())
                ->setDefaultValue([]);

            $netteCode
                ->addProperty($parameter->getName())
                ->setVisibility(Visibility::PRIVATE)
                ->addComment('@var '.$parameter->getInstanceName()->getName().'|'.$collectionOf.'[]');
        }
    }

    private function addAddMethod(ClassType $netteCode, Definition $definition): void
    {
        $addMethod = $netteCode->addMethod('add')
            ->addBody('$this->elements[] = $element;');

        $addMethod->addParameter('element')
            ->setTypeHint($definition->getCollectionOf()->getClassName()->getFullName());
    }

    private function addHasMethod(ClassType $netteCode, Definition $definition): void
    {
        $hasMethod = $netteCode->addMethod('has')
            ->setReturnType('bool')
            ->addBody('foreach ($this->elements as $element) {')
            ->addBody(sprintf('    if ($element->%s() == $id) {', $definition->getCollectionOf()->getAccessor()))
            ->addBody('        return true;')
            ->addBody('    }')
            ->addBody('}')
            ->addBody('return false;');

        $hasMethod->addParameter('id')
            ->setTypeHint($definition->getCollectionOf()->getHas()->getFullName());
    }

    private function addGetMethod(ClassType $netteCode, Definition $definition): void
    {
        $getMethod = $netteCode->addMethod('get')
            ->addBody('foreach ($this->elements as $element) {')
            ->addBody(sprintf('    if ($element->%s() == $id) {', $definition->getCollectionOf()->getAccessor()))
            ->addBody('        return $element;')
            ->addBody('    }')
            ->addBody('}')
            ->addBody('return null;');

        $getMethod->addParameter('id')
            ->setTypeHint($definition->getCollectionOf()->getHas()->getFullName());
    }

    private function addToArrayMethod(ClassType $netteCode): void
    {
        $netteCode
            ->addMethod('toArray')
            ->setReturnType('array')
            ->addBody('return $this->elements;');
    }

    private function addCountMethod(ClassType $netteCode): void
    {
        $netteCode
            ->addMethod('count')
            ->setReturnType('int')
            ->addBody('return count($this->elements);');
    }

    private function addSerializeMethod(ClassType $netteCode): void
    {
        $netteCode
            ->addMethod('serialize')
            ->setReturnType('array')
            ->addBody('$data = [];')
            ->addBody('foreach ($this->elements as $element) {')
            ->addBody('    $data[] = $element->serialize();')
            ->addBody('}')
            ->addBody('return $data;');
    }

    private function addDeserializeMethod(ClassType $netteCode, Definition $definition): void
    {
        $collectionOf = $definition->getCollectionOf()->getClassName()->getName();

        $deserializeMethod = $netteCode
            ->addMethod('deserialize')
            ->setStatic(true)
            ->setReturnType('self')
            ->addBody('$elements = [];')
            ->addBody('foreach ($data as $item) {')
            ->addBody(sprintf('    $elements[] = %s::deserialize($item);', $collectionOf))
            ->addBody('}')
            ->addBody('return new self($elements);');

        $deserializeMethod->addParameter('data')
            ->setTypeHint('array');
    }
}
