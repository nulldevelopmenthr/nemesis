<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core\DefinitionGenerator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataTypeName\AbstractDataTypeName;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use Webmozart\Assert\Assert;

/** @SuppressWarnings("PHPMD.NumberOfChildren") */
abstract class BaseClassDefinitionGenerator implements DefinitionGenerator
{
    /** @var MethodGenerator[] */
    private $methodGenerators;

    public function __construct(array $methodGenerators)
    {
        Assert::allIsInstanceOf($methodGenerators, MethodGenerator::class);
        $this->methodGenerators = $methodGenerators;
    }

    abstract public function supports(Definition $definition): bool;

    public function generateAsString(Definition $definition): string
    {
        $netteCode = $this->generate($definition);

        return $netteCode->__toString();
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function generate(Definition $definition): PhpNamespace
    {
        if (null === $definition->getNamespace()) {
            $namespace = new PhpNamespace('');
        } else {
            $namespace = new PhpNamespace($definition->getNamespace());
        }

        $netteCode = $namespace->addClass($definition->getClassName());

        $this->processParent($namespace, $netteCode, $definition);
        $this->processInterfaces($namespace, $netteCode, $definition);
        $this->processProperties($namespace, $netteCode, $definition);
        $this->processMethods($namespace, $netteCode, $definition);

        //@TODO: move this to a middleware!
        if (count($namespace->getUses()) > 10) {
            $netteCode->addComment('@SuppressWarnings(PHPMD.CouplingBetweenObjects)');
            $netteCode->addComment('@SuppressWarnings(PHPMD.ExcessiveParameterList)');
        }

        return $namespace;
    }

    protected function processParent(PhpNamespace $namespace, ClassType $netteCode, Definition $definition): void
    {
        if (false === $definition->hasParent()) {
            return;
        }
        $namespace->addUse($definition->getParentFullClassName(), $definition->getParentAlias());
        $netteCode->setExtends($definition->getParentFullClassName());
    }

    protected function processInterfaces(PhpNamespace $namespace, ClassType $netteCode, Definition $definition): void
    {
        foreach ($definition->getInterfaces() as $interface) {
            $netteCode->addImplement($interface->getFullName());
            $namespace->addUse($interface->getFullName(), $interface->getAlias());
        }
    }

    protected function processProperties(PhpNamespace $namespace, ClassType $netteCode, Definition $definition): void
    {
        foreach ($definition->getProperties() as $property) {
            $propertyCode = $netteCode->addProperty($property->getName())
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
    }

    protected function processMethods(PhpNamespace $namespace, ClassType $netteCode, Definition $definition): void
    {
        $methods = [];

        foreach ($this->methodGenerators as $methodGenerator) {
            /** @var Method $method */
            foreach ($definition->getMethods() as $method) {
                if (true === $methodGenerator->supports($method)) {
                    $methods[] = $methodGenerator->generate($method);
                    /** @var AbstractDataTypeName $import */
                    foreach ($method->getImports() as $import) {
                        $namespace->addUse($import->getFullName(), $import->getAlias());
                    }
                }
            }
        }

        $netteCode->setMethods($methods);
    }
}