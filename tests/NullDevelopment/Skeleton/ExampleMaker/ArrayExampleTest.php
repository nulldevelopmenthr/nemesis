<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\ExampleMaker;

use NullDevelopment\Skeleton\ExampleMaker\ArrayExample;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\ExampleMaker\ArrayExample
 * @group  unit
 */
class ArrayExampleTest extends TestCase
{
    /** @dataProvider provideSimpleInputs */
    public function testToString($value, string $expectedStringOutput)
    {
        $example = new ArrayExample($value);

        self::assertEquals($expectedStringOutput, $example->__toString());
    }

    public function provideSimpleInputs(): array
    {
        return [
            [[new SimpleExample(1)], '[1]'],
            [[new SimpleExample('1')], "['1']"],
        ];
    }
}
