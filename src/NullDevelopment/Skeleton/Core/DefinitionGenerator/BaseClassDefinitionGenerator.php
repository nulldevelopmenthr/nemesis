<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\Core\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataTypeName\AbstractDataTypeName;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\Skeleton\SourceCode;
use NullDevelopment\Skeleton\SourceCode\DefinitionGenerator;
use NullDevelopment\Skeleton\SourceCode\MethodGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\PhpUnitSpecification;
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
        $code = $this->generate($definition);

        return $code->__toString();
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

        $code = $namespace->addClass($definition->getClassName());

        if ($definition instanceof SourceCode) {
            $code->addComment(
                '@see \\spec\\'.$definition->getFullClassName().'Spec'
            );
            $code->addComment(
                '@see \\Tests\\'.$definition->getFullClassName().'Test'
            );
        } elseif ($definition instanceof PhpUnitSpecification) {
            $code->addComment(
                '@covers \\'.$definition->getSubjectUnderTest()->getFullName()
            );
            $code->addComment(
                '@group  todo'
            );
        }

        if (true === $definition->hasParent()) {
            $namespace->addUse($definition->getParentFullClassName(), $definition->getParentAlias());
            $code->setExtends($definition->getParentFullClassName());
        }

        foreach ($definition->getInterfaces() as $interface) {
            $code->addImplement($interface->getFullName());
            $namespace->addUse($interface->getFullName(), $interface->getAlias());
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

        $code->setMethods($methods);

        //@TODO: move this to a middleware!
        if (count($namespace->getUses()) > 10) {
            $code->addComment('@SuppressWarnings(PHPMD.CouplingBetweenObjects)');
            $code->addComment('@SuppressWarnings(PHPMD.ExcessiveParameterList)');
        }

        return $namespace;
    }
}
