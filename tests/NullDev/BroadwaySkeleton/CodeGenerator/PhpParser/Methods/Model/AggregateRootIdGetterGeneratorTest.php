<?php

declare(strict_types=1);

namespace tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\AggregateRootIdGetterGenerator;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\AggregateRootIdGetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpParser\BuilderFactory;
use tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods\BaseOutputGeneratorTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\AggregateRootIdGetterGenerator
 * @group  nemesis
 */
class AggregateRootIdGetterGeneratorTest extends BaseOutputGeneratorTestCase
{
    public function getGenerator(): AggregateRootIdGetterGenerator
    {
        return new AggregateRootIdGetterGenerator(new BuilderFactory());
    }

    public function testOutput(): void
    {
        $zz     = new Parameter('id', ClassType::createFromFullyQualified('Something\\SomeId'));
        $method = new AggregateRootIdGetterMethod($zz);

        $this->assertOutputMatches($method, '0-no-param');
    }

    public function provideParameters(): array
    {
    }

    public function getBasePath(): string
    {
        $fullName = explode('\\', get_class($this));

        $currentTestClassName = array_pop($fullName);

        return __DIR__.'/sample-output/'.$currentTestClassName;
    }
}
