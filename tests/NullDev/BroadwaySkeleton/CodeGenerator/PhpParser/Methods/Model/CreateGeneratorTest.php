<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\CreateGenerator;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\Model\CreateMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use PhpParser\BuilderFactory;
use Tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods\BaseOutputGeneratorTestCase;

/**
 * @covers \NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\Model\CreateGenerator
 * @group  nemesis
 */
class CreateGeneratorTest extends BaseOutputGeneratorTestCase
{
    public function getGenerator(): CreateGenerator
    {
        return new CreateGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(ClassType $classType, array $params, string $fileName): void
    {
        $method = new CreateMethod($classType, $params);

        $this->assertMethodOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        $classType = ClassType::createFromFullyQualified('Something\\Xxx');

        return [
            [$classType, [], '0-no-param'],
        ];
    }

    public function getBasePath(): string
    {
        $fullName = explode('\\', get_class($this));

        $currentTestClassName = array_pop($fullName);

        return __DIR__.'/sample-output/'.$currentTestClassName;
    }
}
