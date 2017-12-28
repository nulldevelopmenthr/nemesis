<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\ReadModelIdGetterGenerator;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\ReadModelIdGetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use PhpParser\BuilderFactory;
use Tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods\BaseOutputGeneratorTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\ReadModelIdGetterGenerator
 * @group  nemesis
 */
class ReadModelIdGetterGeneratorTest extends BaseOutputGeneratorTestCase
{
    public function getGenerator(): ReadModelIdGetterGenerator
    {
        return new ReadModelIdGetterGenerator(new BuilderFactory());
    }

    public function testOutput(): void
    {
        $zz = Parameter::create('id', 'Something\\SomeId');

        $method = new ReadModelIdGetterMethod($zz);

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
