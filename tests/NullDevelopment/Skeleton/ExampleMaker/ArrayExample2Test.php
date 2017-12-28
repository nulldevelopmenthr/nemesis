<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\ExampleMaker;

use NullDevelopment\Skeleton\ExampleMaker\ArrayExample2;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\ExampleMaker\ArrayExample2
 * @group  todo
 */
class ArrayExample2Test extends TestCase
{
    /** @dataProvider provideSimpleInputs */
    public function testToString($value, string $expectedStringOutput)
    {
        $example = new ArrayExample2($value);

        self::assertEquals($expectedStringOutput, $example->__toString());
    }

    public function provideSimpleInputs(): array
    {
        return [
            [[new SimpleExample(1)], "['0'=>1]"],
            [[new SimpleExample('1')], "['0'=>'1']"],
        ];
    }
}
