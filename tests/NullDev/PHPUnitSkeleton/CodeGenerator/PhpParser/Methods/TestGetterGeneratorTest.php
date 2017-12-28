<?php

declare(strict_types=1);

namespace Tests\NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\TestGetterGenerator;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestGetterMethod;
use NullDev\Skeleton\Definition\PHP\Methods\GetterMethod;
use NullDev\Skeleton\Definition\PHP\Property;
use PhpParser\BuilderFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\TestGetterGenerator
 * @group  nemesis
 */
class TestGetterGeneratorTest extends TestCase
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

        $this->assertMethodOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        return [
            [
                GetterMethod::create(Property::create('currencyCode', 'string')),
                'money',
                '0-string',
            ],
            [
                GetterMethod::create(Property::create('amount', 'int')),
                'money',
                '1-integer',
            ],
            [
                GetterMethod::create(Property::create('currency', 'Money\Currency')),
                'money',
                '10-currency-object',
            ],
        ];
    }
}
