<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\RepositoryConstructorGenerator;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\RepositoryConstructorMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpParser\BuilderFactory;
use tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods\BaseOutputGeneratorTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\RepositoryConstructorGenerator
 * @group  nemesis
 */
class RepositoryConstructorGeneratorTest extends BaseOutputGeneratorTestCase
{
    public function getGenerator(): RepositoryConstructorGenerator
    {
        return new RepositoryConstructorGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(ClassType $classType, string $fileName): void
    {
        $method = new RepositoryConstructorMethod($classType);

        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        $classType = ClassType::createFromFullyQualified('Something\\Xxx');

        return [
            [$classType, '0-no-param'],
        ];
    }

    public function getBasePath(): string
    {
        $fullName = explode('\\', get_class($this));

        $currentTestClassName = array_pop($fullName);

        return __DIR__.'/sample-output/'.$currentTestClassName;
    }
}
