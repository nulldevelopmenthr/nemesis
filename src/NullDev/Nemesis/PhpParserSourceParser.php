<?php

declare(strict_types=1);

namespace NullDev\Nemesis;

use NullDev\Skeleton\Definition\PHP\Methods\ConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GenericMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\Method;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\Type;
use NullDev\Skeleton\Definition\PHP\Types\TypeFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpParser\Node\NullableType;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Property;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Parser;
use PhpParser\ParserFactory;

/**
 * @see SourceParserSpec
 * @see SourceParserTest
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 * @SuppressWarnings(PHPMD.NPathComplexity)
 */
class PhpParserSourceParser implements SourceParser
{
    /**
     * @var Parser
     */
    private $parser;
    private $namespace;
    private $class;
    private $imports;

    public function __construct()
    {
        $this->parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
    }

    public function parse(string $code): array
    {
        $parsedStatements = $this->parser->parse($code);
        $this->imports    = [];

        $results = [];

        foreach ($parsedStatements as $parsedStatement) {
            if ($parsedStatement instanceof Namespace_) {
                $results = array_merge($results, $this->parseNamespace($parsedStatement));
            } elseif ($parsedStatement instanceof Class_) {
                $results[] = $this->parseClass($parsedStatement, null);
            } elseif ($parsedStatement instanceof Use_) {
                $this->imports[] = ClassType::createFromFullyQualified((string) $parsedStatement->uses[0]->name);
            }
        }

        foreach ($this->imports as $import) {
            foreach ($results as $result) {
                $result->addImport($import);
            }
        }

        return $results;
    }

    private function parseNamespace(Namespace_ $namespaceStatement): array
    {
        $this->namespace = (string) $namespaceStatement->name;

        $results = [];

        foreach ($namespaceStatement->stmts as $parsedStatement) {
            if ($parsedStatement instanceof Use_) {
                $this->imports[] = ClassType::createFromFullyQualified((string) $parsedStatement->uses[0]->name);
            }
        }

        foreach ($namespaceStatement->stmts as $parsedStatement) {
            if ($parsedStatement instanceof Class_) {
                $results[] = $this->parseClass($parsedStatement, $this->namespace);
            }
        }

        return $results;
    }

    private function parseClass(Class_ $classStatement, ?string $namespaceName): ImprovedClassSource
    {
        $className = (string) $classStatement->name;

        $this->class = new ImprovedClassSource(new ClassType($className, $namespaceName));

        // Constructor parsing
        foreach ($classStatement->stmts as $parsedStatement) {
            if ($parsedStatement instanceof ClassMethod) {
                $method = $this->parseMethod($parsedStatement);

                if ($method instanceof ConstructorMethod) {
                    $this->class->addConstructorMethod($method);
                }
            }
        }

        foreach ($classStatement->stmts as $parsedStatement) {
            if ($parsedStatement instanceof Property) {
                $propertyName = $parsedStatement->props[0]->name;

                $property = new Parameter($propertyName);

                // If constructor has param of same name, add that one as property since it has a class defined!
                if (true === $this->class->hasConstructorMethod()) {
                    foreach ($this->class->getConstructorParameters() as $constructorParameter) {
                        if ($constructorParameter->getName() === $propertyName) {
                            $property = $constructorParameter;
                        }
                    }
                }

                $this->class->addProperty($property);
            }
        }

        //other methods

        foreach ($classStatement->stmts as $parsedStatement) {
            if ($parsedStatement instanceof ClassMethod && true === $parsedStatement->isPublic()) {
                $method = $this->parseMethod($parsedStatement);

                if (false === $method instanceof ConstructorMethod) {
                    $this->class->addMethod($method);
                }
            }
        }

        return $this->class;
    }

    private function parseMethod(ClassMethod $classMethodStatement): Method
    {
        $methodName = $classMethodStatement->name;

        if ('__construct' === $methodName) {
            $params = [];

            foreach ($classMethodStatement->params as $param) {
                if ($param->type instanceof NullableType) {
                    $typeName = (string) $param->type->type;
                } else {
                    $typeName = (string) $param->type;
                }

                $params[] = new Parameter($param->name, $this->createType($typeName));
            }

            $method = new ConstructorMethod($params);

            return $method;
        } elseif (0 === strpos($methodName, 'get')) {
            $paramName = lcfirst(substr($methodName, 3));

            return $this->createGetterMethod($paramName, $classMethodStatement);
        } elseif (0 === strpos($methodName, 'is')) {
            $paramName = lcfirst(substr($methodName, 2));

            return $this->createGetterMethod($paramName, $classMethodStatement);
        } elseif (0 === strpos($methodName, 'has')) {
            $paramName = lcfirst(substr($methodName, 3));

            return $this->createGetterMethod($paramName, $classMethodStatement);
        }
        $method = new GenericMethod($methodName, [], null);

        return $method;
    }

    private function createGetterMethod(string $paramName, $classMethodStatement): Method
    {
        if (false === $this->class->hasPropertyNamed($paramName)) {
            return new GenericMethod($classMethodStatement->name, [], null);
        }

        if (false === $this->class->hasConstructorParameterNamed($paramName)) {
            return new GenericMethod($classMethodStatement->name, [], null);
        }

        if ($classMethodStatement->returnType instanceof NullableType) {
            $returnTypeName = (string) $classMethodStatement->returnType->type;
        } else {
            $returnTypeName = (string) $classMethodStatement->returnType;
        }

        $type = $this->createType($returnTypeName);

        if (null === $type) {
            $param = $this->class->getPropertyNamed($paramName);
        } else {
            $param = new Parameter($paramName, $type);
        }

        $method = new GetterMethod($classMethodStatement->name, $param);

        return $method;
    }

    protected function createType(string $input): ?Type
    {
        foreach ($this->imports as $import) {
            if ($import->getName() === $input) {
                return $import;
            }
        }

        if ('' === $input) {
            return null;
        }

        if (TypeFactory::isTypeDeclaration($input)) {
            return TypeFactory::create($input);
        }

        if (class_exists($input)) {
            return ClassType::createFromFullyQualified($input);
        }

        if (class_exists($this->namespace.'\\'.$input)) {
            return ClassType::createFromFullyQualified($this->namespace.'\\'.$input);
        }

        throw new \Exception('Unknown class '.$input);
    }
}
