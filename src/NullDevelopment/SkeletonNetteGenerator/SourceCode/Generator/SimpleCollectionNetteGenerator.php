<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonNetteGenerator\SourceCode\Generator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\DataType\MethodParameter;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\Definition\SimpleCollection;
use NullDevelopment\SkeletonNetteGenerator\BaseNetteGenerator;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\ClassMiddleware;
use NullDevelopment\SkeletonNetteGenerator\SourceCode\Middleware\NamespaceMiddleware;

/**
 * @see SimpleCollectionNetteGeneratorSpec
 * @see SimpleCollectionNetteGeneratorTest
 */
class SimpleCollectionNetteGenerator extends BaseNetteGenerator
{
    public function __construct()
    {
        $middleware = [
            new ClassMiddleware(),
            new NamespaceMiddleware(),
        ];
        parent::__construct($middleware);
    }

    public function supports($definition): bool
    {
        if ($definition instanceof SimpleCollection) {
            return true;
        }

        return false;
    }

    public function handleSimpleCollection(SimpleCollection $definition): array
    {
        return [$this->generate($definition)];
    }

    public function generate(SimpleCollection $definition): PhpNamespace
    {
        $middlewareChain = $this->middlewareChain;
        $namespace       = $middlewareChain($definition);

        $namespace->addUse($definition->getCollectionOf()->getClassName()->getFullName());
        $namespace->addUse($definition->getCollectionOf()->getHas()->getFullName());
        $namespace->addUse('Webmozart\Assert\Assert');

        $collectionOf=$definition->getCollectionOf()->getClassName()->getName();

        /** @var ClassType $class */
        foreach ($namespace->getClasses() as $class) {
            $constructorMethod = $class->addMethod('__construct')
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

                $property = $class->addProperty($parameter->getName())
                    ->setVisibility(Visibility::PRIVATE);

                $property->addComment('@var '.$parameter->getInstanceName()->getName().'|'.$collectionOf.'[]');
            }

            $addMethod = $class->addMethod('add')
                ->addBody('$this->elements[] = $element;');

            $addMethod->addParameter('element')
                ->setTypeHint($definition->getCollectionOf()->getClassName()->getFullName());

            $hasMethod = $class->addMethod('has')
                ->setReturnType('bool')
                ->addBody('foreach ($this->elements as $element) {')
                ->addBody(sprintf('    if ($element->%s() == $id) {', $definition->getCollectionOf()->getAccessor()))
                ->addBody('        return true;')
                ->addBody('    }')
                ->addBody('}')
                ->addBody('return false;');

            $hasMethod->addParameter('id')
                ->setTypeHint($definition->getCollectionOf()->getHas()->getFullName());

            $getMethod = $class->addMethod('get')
                ->addBody('foreach ($this->elements as $element) {')
                ->addBody(sprintf('    if ($element->%s() == $id) {', $definition->getCollectionOf()->getAccessor()))
                ->addBody('        return $element;')
                ->addBody('    }')
                ->addBody('}')
                ->addBody('return null;');

            $getMethod->addParameter('id')
                ->setTypeHint($definition->getCollectionOf()->getHas()->getFullName());

            $class->addMethod('toArray')->setReturnType('array')->addBody('return $this->elements;');

            $class->addMethod('count')->setReturnType('int')->addBody('return count($this->elements);');

            ///

            $serializeMethod = $class->addMethod('serialize')
                ->setReturnType('array');

            $serializeMethod->addBody('$data = [];');
            $serializeMethod->addBody('foreach ($this->elements as $element) {');
            $serializeMethod->addBody('    $data[] = $element->serialize();');
            $serializeMethod->addBody('}');
            $serializeMethod->addBody('return $data;');

            ///

            $deserializeMethod = $class->addMethod('deserialize')->setStatic(true)->setReturnType('self');

            $deserializeMethod->addParameter('data')
                ->setTypeHint('array');

            $deserializeMethod->addBody('$elements = [];');
            $deserializeMethod->addBody('foreach ($data as $item) {');
            $deserializeMethod->addBody(sprintf('    $elements[] = %s::deserialize($item);', $collectionOf));
            $deserializeMethod->addBody('}');
            $deserializeMethod->addBody('return new self($elements);');
        }

        return $namespace;
    }
}
