<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\DefinitionGenerator;

use Nette\PhpGenerator\PhpNamespace;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\Type\Definition;
use NullDevelopment\PhpStructure\Type\InterfaceDefinition;
use NullDevelopment\Skeleton\Core\DefinitionGenerator;
use NullDevelopment\Skeleton\Core\MethodGenerator;
use NullDevelopment\SkeletonSourceCodeExtension\Result;
use Webmozart\Assert\Assert;

/**
 * @see InterfaceGeneratorSpec
 * @see InterfaceGeneratorTest
 */
class InterfaceGenerator implements DefinitionGenerator
{
    /** @var MethodGenerator[] */
    private $methodGenerators;

    public function __construct(array $methodGenerators)
    {
        Assert::allIsInstanceOf($methodGenerators, MethodGenerator::class);
        $this->methodGenerators = $methodGenerators;
    }

    public function supports(Definition $definition): bool
    {
        if ($definition instanceof InterfaceDefinition) {
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
     */
    public function generate(Definition $definition): PhpNamespace
    {
        if (null === $definition->getNamespace()) {
            $namespace = new PhpNamespace('');
        } else {
            $namespace = new PhpNamespace($definition->getNamespace());
        }

        $interface = $namespace->addInterface($definition->getClassName());

        if (true === $definition->hasParent()) {
            $interface->setExtends($definition->getParentFullClassName());
            $namespace->addUse($definition->getParentFullClassName(), $definition->getParentAlias());
        }

        foreach ($definition->getConstants() as $constant) {
            $interface->addConstant($constant->getConstantName()->__toString(), $constant->getValue());
        }

        /** @var Method $method */
        foreach ($definition->getMethods() as $method) {
            $methodCode = $interface
                ->addMethod($method->getName())
                ->setStatic($method->isStatic())
                ->setReturnNullable($method->isNullableReturnType())
                ->setReturnType($method->getReturnType())
            ;

            foreach ($method->getParameters() as $parameter) {
                $methodCode->addParameter($parameter->getName())
                    ->setTypeHint($parameter->getInstanceFullName());

                if ($parameter->isObject()) {
                    $namespace->addUse($parameter->getInstanceFullName());
                }
            }

            foreach ($method->getImports() as $import) {
                $namespace->addUse($import->getFullName(), $import->getAlias());
            }
        }

        return $namespace;
    }

    public function handleInterfaceDefinition(InterfaceDefinition $definition): array
    {
        return [
            new Result($definition, $this->generate($definition)),
        ];
    }
}
