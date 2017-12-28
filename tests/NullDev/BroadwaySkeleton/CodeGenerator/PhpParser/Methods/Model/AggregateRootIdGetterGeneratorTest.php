<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\AggregateRootIdGetterGenerator;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\AggregateRootIdGetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PhpParser\BuilderFactory;
use Tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods\BaseOutputGeneratorTestCase;

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
        $zz     = Parameter::create('id', 'Something\\SomeId');
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
