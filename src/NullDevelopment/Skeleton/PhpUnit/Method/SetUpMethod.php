<?php

declare(strict_types=1);

namespace NullDevelopment\Skeleton\PhpUnit\Method;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use OutOfBoundsException;
use Roave\BetterReflection\BetterReflection;
use Webmozart\Assert\Assert;

/**
 * @see SetUpMethodSpec
 * @see SetUpMethodTest
 */
class SetUpMethod extends BaseTestMethod
{
    /** @var ClassName */
    private $className;

    /** @var array|Property[] */
    private $properties;

    public function __construct(ClassName $className, array $properties)
    {
        Assert::allIsInstanceOf($properties, Property::class);
        $this->className  = $className;
        $this->properties = $properties;
    }

    public function getClassName(): ClassName
    {
        return $this->className;
    }

    public function getName(): string
    {
        return 'setUp';
    }

    /** @return \NullDevelopment\PhpStructure\DataType\Property[] */
    public function getParameters(): array
    {
        return $this->properties;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    public function getImports(): array
    {
        $imports = [
            $this->className,
        ];

        foreach ($this->properties as $property) {
            if (true === $property->isObject()) {
                $imports[] = $property->getInstanceName();

                $imports = array_merge($imports, $this->recursivelyGrabImports($property->getInstanceFullName()));
            }
        }

        return $imports;
    }

    /** @return \NullDevelopment\PhpStructure\DataTypeName\ContractName[] */
    private function recursivelyGrabImports(string $className): array
    {
        $refl = (new BetterReflection())
            ->classReflector()
            ->reflect($className);

        try {
            $constructor = $refl->getConstructor();
        } catch (OutOfBoundsException $exception) {
            return [];
        }

        $imports = [];

        foreach ($constructor->getParameters() as $constructorParam) {
            if (null === $constructorParam->getType()) {
                continue;
            }
            $type = $constructorParam->getType()->__toString();

            if (false === in_array($type, ['int', 'string', 'float', 'bool', 'array'])) {
                $imports[] = ClassName::create($type);
                $imports   = array_merge($imports, $this->recursivelyGrabImports($type));
            }

            foreach ($constructorParam->getDocBlockTypeStrings() as $docBlockType) {
                if ('[]' === substr($docBlockType, -2, 2)) {
                    $docBlockType = substr($docBlockType, 0, -2);
                }

                $imports[] = ClassName::create($docBlockType);
                $imports   = array_merge($imports, $this->recursivelyGrabImports($docBlockType));
            }
        }

        return $imports;
    }
}
