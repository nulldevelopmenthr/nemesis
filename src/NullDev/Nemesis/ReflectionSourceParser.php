<?php

declare(strict_types=1);

namespace NullDev\Nemesis;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GenericMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\Type;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\ArrayType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\BoolType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\FloatType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Parser;
use PhpParser\ParserFactory;
use ReflectionMethod;

/**
 * @see SourceParserSpec
 * @see SourceParserTest
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 * @SuppressWarnings(PHPMD.NPathComplexity)
 */
class ReflectionSourceParser implements SourceParser
{
    /**
     * @var Parser
     */
    private $parser;
    private $namespace;

    public function __construct()
    {
        $this->parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
    }

    private function parseOutClassNames(string $code): array
    {
        $parsedStatements = $this->parser->parse($code);

        $classNames = [];
        foreach ($parsedStatements as $parsedStatement) {
            if ($parsedStatement instanceof Namespace_) {
                $this->namespace = (string) $parsedStatement->name;

                foreach ($parsedStatement->stmts as $subParsedStatement) {
                    if ($subParsedStatement instanceof Class_) {
                        $classNames[] = (string) $subParsedStatement->name;
                    }
                }
            } elseif ($parsedStatement instanceof Class_) {
                $classNames[] = (string) $parsedStatement->name;
            }
        }

        return $classNames;
    }

    public function parse(string $code): array
    {
        $results = [];

        foreach ($this->parseOutClassNames($code) as $className) {
            $results[] = new ImprovedClassSource(new ClassType($className, $this->namespace));
        }

        /** @var ImprovedClassSource $result */
        foreach ($results as $result) {
            $reflection = new \ReflectionClass($result->getFullName());

            if (true === $reflection->hasMethod('__construct')) {
                $reflectedConstructor = $reflection->getMethod('__construct');

                $params = [];

                foreach ($reflectedConstructor->getParameters() as $reflectionParameter) {
                    $type = $this->createType($reflectionParameter);

                    $params[] = new Parameter($reflectionParameter->getName(), $type);
                }

                $constructorMethod = new ConstructorMethod($params);

                $result->addConstructorMethod($constructorMethod);
            }

            foreach ($reflection->getProperties() as $reflectionProperty) {
                $found = false;
                foreach ($result->getConstructorParameters() as $constructorParameter) {
                    if ($constructorParameter->getName() === $reflectionProperty->getName()) {
                        $found = true;

                        $result->addProperty($constructorParameter);
                        break;
                    }
                }

                if (false === $found) {
                    $result->addProperty(new Parameter($reflectionProperty->getName()));
                }
            }

            ///
            //methods
            ///

            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $reflectionMethod) {
                $methodName = $reflectionMethod->getName();
                if ('__construct' === $methodName) {
                    continue;
                }

                $paramName = $this->isNamedLikeGetterMethod($methodName);

                if (null === $paramName) {
                    $result->addMethod(new GenericMethod($methodName, [], null));
                } else {
                    if (true === $reflectionMethod->hasReturnType()) {
                        $result->addMethod(
                            new GetterMethod(
                                $methodName,
                                new Parameter($paramName, $this->createType2($reflectionMethod->getReturnType()))
                            )
                        );
                        continue;
                    }

                    $found = false;

                    foreach ($result->getProperties() as $property) {
                        if ($property->getName() === $paramName) {
                            $result->addMethod(new GetterMethod($methodName, $property));

                            $found = true;
                            break;
                        }
                    }
                    if (false === $found) {
                        $result->addMethod(new GenericMethod($methodName, [], null));
                    }
                }
            }
        }

        return $results;
    }

    private function isNamedLikeGetterMethod(string $methodName): ?string
    {
        $prefixes = ['get', 'is', 'has'];

        foreach ($prefixes as $prefix) {
            if (0 === strpos($methodName, $prefix)) {
                return lcfirst(substr($methodName, strlen($prefix)));
            }
        }

        return null;
    }

    protected function createType(\ReflectionParameter $input): ?Type
    {
        if (false === $input->hasType()) {
            return null;
        }

        $type = null;

        if (true === $input->isArray()) {
            $type = new ArrayType();
        } elseif ('string' === $input->getType()->__toString()) {
            $type = new StringType();
        } elseif ('int' === $input->getType()->__toString()) {
            $type = new IntType();
        } elseif ('float' === $input->getType()->__toString()) {
            $type = new FloatType();
        } elseif ('bool' === $input->getType()->__toString()) {
            $type = new BoolType();
        } else {
            $type = ClassType::createFromFullyQualified($input->getType()->__toString());
        }

        return $type;
    }

    protected function createType2(\ReflectionType $input): ?Type
    {
        $input = $input->__toString();

        $type = null;

        if ('' === $input) {
            $type = null;
        } elseif ('string' === $input) {
            $type = new StringType();
        } elseif ('int' === $input) {
            $type = new IntType();
        } elseif ('float' === $input) {
            $type = new FloatType();
        } elseif ('array' === $input) {
            $type = new ArrayType();
        } elseif ('bool' === $input) {
            $type = new BoolType();
        } else {
            $type = ClassType::createFromFullyQualified($input);
        }

        return $type;
    }
}
