<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\TestNothingGenerator;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\TestNothingMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpParser\BuilderFactory;
use PHPUnit_Framework_TestCase;
use tests\NullDev\Skeleton\CodeGenerator\SeniorDeveloperProvider;

/**
 * @covers \NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\TestNothingGenerator
 * @group  nemesis
 */
class TestNothingGeneratorTest extends PHPUnit_Framework_TestCase
{
    use OutputGeneratorTestTrait;

    public function getGenerator(): TestNothingGenerator
    {
        return new TestNothingGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     */
    public function testOutput(ImprovedClassSource $classSource, string $fileName): void
    {
        $method = new TestNothingMethod($classSource);

        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        $provider = new SeniorDeveloperProvider();

        return [
            [new ImprovedClassSource($provider->provideClassType()), 'nothing'],
            [$provider->provideSourceWithParent(), 'nothing'],
            [$provider->provideSourceWithInterface(), 'nothing'],
            [$provider->provideSourceWithTrait(), 'nothing'],
            [$provider->provideSourceWithAll(), 'nothing'],
            [$provider->provideSourceWithAllMulti(), 'nothing'],
            [$provider->provideSourceWithOneParamConstructor(), 'nothing'],
            [$provider->provideSourceWithTwoParamConstructor(), 'nothing'],
            [$provider->provideSourceWithThreeParamConstructor(), 'nothing'],
            [$provider->provideSourceWithOneClasslessParamConstructor(), 'nothing'],
            [$provider->provideSourceWithOneTypeDeclarationParamConstructor(), 'nothing'],
        ];
    }
}
