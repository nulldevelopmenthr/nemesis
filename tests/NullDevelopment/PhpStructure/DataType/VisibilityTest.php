<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\PhpStructure\DataType;

use NullDevelopment\PhpStructure\DataType\Visibility;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\PhpStructure\DataType\Visibility
 * @group  unit
 */
class VisibilityTest extends TestCase
{
    /**
     * @dataProvider provideValues
     */
    public function testValues(string $value)
    {
        self::assertInstanceOf(Visibility::class, new Visibility($value));
    }

    public function provideValues(): array
    {
        return [
            ['private'],
            ['protected'],
            ['public'],
        ];
    }
}
