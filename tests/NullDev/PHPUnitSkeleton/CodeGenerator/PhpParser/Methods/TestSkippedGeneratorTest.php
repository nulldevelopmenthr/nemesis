<?php

declare(strict_types=1);

namespace Tests\NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\TestSkippedGenerator;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestSkippedMethod;
use PhpParser\BuilderFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\TestSkippedGenerator
 * @group  nemesis
 */
class TestSkippedGeneratorTest extends TestCase
{
    use OutputGeneratorTestTrait;

    public function getGenerator(): TestSkippedGenerator
    {
        return new TestSkippedGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(string $methodName, string $fileName): void
    {
        $method = new TestSkippedMethod($methodName);

        $this->assertMethodOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        return [
            [
                'doSomething',
                '0-no-param',
            ],
        ];
    }
}
