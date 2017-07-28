<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\InitializableGenerator;
use NullDev\PhpSpecSkeleton\Definition\PHP\Methods\InitializableMethod;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\InterfaceType;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PhpSpecSkeleton\CodeGenerator\PhpParser\Methods\InitializableGenerator
 * @group  integration
 */
class InitializableGeneratorTest extends PHPUnit_Framework_TestCase
{
    use OutputGeneratorTestTrait;

    public function getGenerator(): InitializableGenerator
    {
        return new InitializableGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(array $parameters, string $fileName): void
    {
        $method = new InitializableMethod($parameters);

        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        return [
            [
                [],
                '0-no-params',
            ],
            [
                [ClassType::createFromFullyQualified('MyNamespace\FirstName')],
                '1-class',
            ],
            [
                [
                    ClassType::createFromFullyQualified('MyNamespace\FirstName'),
                    InterfaceType::createFromFullyQualified('Vendor\Namespace\Name'),
                ],
                '2-class-and-interface',
            ],
            [
                [
                    ClassType::createFromFullyQualified('MyNamespace\FirstName'),
                    ClassType::createFromFullyQualified('Vendor\Namespace\FirstName'),
                ],
                '3-class-and-parent',
            ],
            [
                [
                    ClassType::createFromFullyQualified('MyNamespace\FirstName'),
                    ClassType::createFromFullyQualified('Vendor\Namespace\FirstName'),
                    InterfaceType::createFromFullyQualified('Vendor\Namespace\Name'),
                ],
                '4-class-parent-interface',
            ],
        ];
    }
}
