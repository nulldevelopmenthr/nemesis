<?php

declare(strict_types=1);

namespace NullDevelopment\SkeletonSourceCodeExtension\MethodGenerator;

use Nette\PhpGenerator\Method as NetteMethod;
use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\SkeletonSourceCodeExtension\Method\DeserializeMethod;
use Roave\BetterReflection\BetterReflection;

/**
 * @see DeserializeMethodGeneratorSpec
 * @see DeserializeMethodGeneratorTest
 */
class DeserializeMethodGenerator extends BaseMethodGenerator
{
    public function supports(Method $method): bool
    {
        if ($method instanceof DeserializeMethod) {
            return true;
        }

        return false;
    }

    public function generate(Method $method): NetteMethod
    {
        $code = new NetteMethod($method->getName());

        $code->setVisibility((string) $method->getVisibility());
        $code->setStatic($method->isStatic());

        if ('' !== $method->getReturnType()) {
            $code->setReturnType($method->getReturnType());
            $code->setReturnNullable($method->isNullableReturnType());
        }

        foreach ($method->getParameters() as $parameter) {
            if (true === $parameter->isObject()) {
                $refl = (new BetterReflection())
                    ->classReflector()
                    ->reflect($parameter->getInstanceFullName());

                foreach ($refl->getConstructor()->getParameters() as $constructorParam) {
                    $code->addParameter($constructorParam->getName())
                        ->setTypeHint($constructorParam->getType()->__toString());
                }
            } else {
                $code->addParameter($parameter->getName())
                    ->setTypeHint($parameter->getInstanceFullName());
            }
        }

        $this->generateMethodBody($method, $code);

        return $code;
    }

    protected function generateMethodBody($method, NetteMethod $code)
    {
        if (1 === count($method->getProperties())) {
            $params = [];

            foreach ($method->getProperties() as $property) {
                if (true === $property->isObject()) {
                    $params[] = sprintf(
                        '%s::deserialize($%s)',
                        $property->getInstanceNameAsString(),
                        $property->getName()
                    );
                } else {
                    $params[] = '$'.$property->getName();
                }
            }

            $code->addBody(
                sprintf('return new self(%s);', implode(', ', $params))
            );
        } else {
            $deserializeList = [];

            // @var Property $property
            foreach ($method->getProperties() as $property) {
                $contractName = $property->getInstanceName()->getName();
                if (true === in_array($property->getInstanceFullName(), ['int', 'string', 'float', 'bool', 'array'])) {
                    $deserializeList[] = sprintf("\$data['%s']", $property->getName());
                } elseif ('DateTime' === $property->getInstanceFullName()) {
                    $deserializeList[] = sprintf("new DateTime(\$data['%s'])", $property->getName());
                } else {
                    if (true === $property->isNullable()) {
                        $code->addBody(sprintf('if(null === $data[\'%s\']){', $property->getName()));
                        $code->addBody(sprintf('    $%s = null;', $property->getName()));
                        $code->addBody('}else{');
                        $code->addBody(
                            sprintf(
                                "    $%s = %s::deserialize(\$data['%s']);",
                                $property->getName(),
                                $contractName,
                                $property->getName()
                            )
                        );
                        $code->addBody('}');
                        $code->addBody('');

                        $deserializeList[] = sprintf('$%s', $property->getName());
                    } else {
                        $deserializeList[] = sprintf(
                            "%s::deserialize(\$data['%s'])",
                            $contractName,
                            $property->getName()
                        );
                    }
                }
            }

            $indent = PHP_EOL.'    ';

            $code->addBody('return new self('.$indent.implode(', '.$indent, $deserializeList).PHP_EOL.');');
        }
    }
}
