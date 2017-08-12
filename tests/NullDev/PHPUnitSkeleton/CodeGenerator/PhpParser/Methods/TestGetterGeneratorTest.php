<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\TestGetterGenerator;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestGetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Parameter;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\IntType;
use NullDev\Skeleton\Definition\PHP\Types\TypeDeclaration\StringType;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\TestGetterGenerator
 * @group nemesis
 */
class TestGetterGeneratorTest extends PHPUnit_Framework_TestCase
{
    use OutputGeneratorTestTrait;

    public function getGenerator(): TestGetterGenerator
    {
        return new TestGetterGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(GetterMethod $getterMethod, string $propertyName, string $fileName): void
    {
        $method = new TestGetterMethod($getterMethod, $propertyName);

        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        return [
            [
                GetterMethod::create(new Parameter('currencyCode', new StringType())),
                'money',
                '0-string',
            ],
            [
                GetterMethod::create(new Parameter('amount', new IntType())),
                'money',
                '1-integer',
            ],
            [
                GetterMethod::create(new Parameter('currency', ClassType::createFromFullyQualified('Money\Currency'))),
                'money',
                '10-currency-object',
            ],
        ];
    }
}
