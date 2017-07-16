<?php

declare(strict_types=1);

namespace NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod;
use NullDev\Skeleton\CodeGenerator\CodeGenerator;
use PhpParser\BuilderFactory;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\DNumber;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\String_;

/**
 * @see SetUpGeneratorSpec
 * @see SetUpGeneratorTest
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SetUpGenerator implements CodeGenerator
{
    private $builderFactory;

    public function __construct(BuilderFactory $builderFactory)
    {
        $this->builderFactory = $builderFactory;
    }

    public static function default(): self
    {
        return new self(new BuilderFactory());
    }

    public function supports($classMethod): bool
    {
        return $classMethod instanceof SetUpMethod;
    }

    public function generate(SetUpMethod $method)
    {
        $node = $this->builderFactory
            ->method($method->getMethodName())
            ->makePublic();

        $node->addStmt(
            new Assign(
                new Variable(
                    'this->'.lcfirst($method->getSubjectUnderTestName())
                ),
                new New_(
                    new Name($method->getSubjectUnderTestName()),
                    $this->createConstructorParams($method->getSubjectUnderTest()->getFullName())
                )
            )
        );

        return $node;
    }

    private function createConstructorParams(string $className): array
    {
        $reflection        = new \ReflectionClass($className);
        $constructorParams = [];
        if (null !== $reflection->getConstructor()) {
            foreach ($reflection->getConstructor()->getParameters() as $parameter) {
                $constructorParams[] = $this->createSubjectUnderTestArgument($parameter);
            }
        }

        return $constructorParams;
    }

    private function createSubjectUnderTestArgument(\ReflectionParameter $parameter)
    {
        if (null === $parameter->getType()) {
            return new String_($parameter->getName());
        } elseif ('string' === $parameter->getType()->getName()) {
            return new String_($parameter->getName());
        } elseif ('int' === $parameter->getType()->getName()) {
            return new LNumber(1);
        } elseif ('array' === $parameter->getType()->getName()) {
            return new Array_([], ['kind' => Array_::KIND_SHORT]);
        } elseif ('float' === $parameter->getType()->getName()) {
            return new DNumber(2.0);
        } else {
            return new StaticCall(
                new Name('Mockery'), 'mock',
                [new ClassConstFetch(new Name('\\'.$parameter->getType()), 'class')]
            );
        }

        throw new \Exception('ERR 2352365235: Unhandled argument received.');
    }
}
