<?php

declare(strict_types=1);

namespace NullDev\Skeleton\CodeGenerator;

use NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\SetUpGenerator;
use NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\TestNothingGenerator;
use NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model\AggregateRootIdGetterGenerator;
use NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model\CreateGenerator;
use NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model\ReadModelIdGetterGenerator;
use NullDev\Skeleton\Broadway\CodeGenerator\PhpParser\Methods\Model\RepositoryConstructorGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\ClassGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\MethodFactory;
use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ConstructorGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\DeserializeGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\GetterGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\SerializeGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\ToStringGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParser\Methods\UuidCreateGenerator;
use NullDev\Skeleton\PhpSpec\CodeGenerator\PhpParser\Methods\ExposeConstructorArgumentsAsGettersGenerator;
use NullDev\Skeleton\PhpSpec\CodeGenerator\PhpParser\Methods\InitializableGenerator;
use NullDev\Skeleton\PhpSpec\CodeGenerator\PhpParser\Methods\LetGenerator;
use PhpParser\BuilderFactory;
use PhpParser\PrettyPrinter;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PhpParserGeneratorFactory
{
    public static function create(): PhpParserGenerator
    {
        $generator = new PhpParserGenerator(
            new BuilderFactory(),
            ClassGenerator::default(),
            new MethodFactory(
                [
                    ConstructorGenerator::default(),
                    DeserializeGenerator::default(),
                    GetterGenerator::default(),
                    SerializeGenerator::default(),
                    ToStringGenerator::default(),
                    UuidCreateGenerator::default(),
                    CreateGenerator::default(),
                    AggregateRootIdGetterGenerator::default(),
                    RepositoryConstructorGenerator::default(),
                    ReadModelIdGetterGenerator::default(),
                    LetGenerator::default(),
                    InitializableGenerator::default(),
                    ExposeConstructorArgumentsAsGettersGenerator::default(),
                    SetUpGenerator::default(),
                    TestNothingGenerator::default(),
                ]
            ),
            new PrettyPrinter\Standard()
        );

        return $generator;
    }
}
