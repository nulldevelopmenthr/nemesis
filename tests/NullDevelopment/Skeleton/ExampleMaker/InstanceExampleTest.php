<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\ExampleMaker;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\ExampleMaker\InstanceExample;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\ExampleMaker\InstanceExample
 * @group  unit
 */
class InstanceExampleTest extends TestCase
{
    /** @dataProvider provideSimpleInputs */
    public function testToString(ClassName $instanceOf, array $parameters, string $expectedStringOutput)
    {
        $example = new InstanceExample($instanceOf, $parameters);

        self::assertEquals($expectedStringOutput, $example->__toString());
    }

    public function provideSimpleInputs(): array
    {
        return [
            [new ClassName('DateTime'), [new SimpleExample('2018-01-01 00:01:00')], "new DateTime('2018-01-01 00:01:00')"],
        ];
    }
}
