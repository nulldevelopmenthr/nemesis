<?php

declare(strict_types=1);

namespace Tests\NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\SetUpGenerator;
use NullDev\PHPUnitSkeleton\Definition\PHP\Methods\SetUpMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpParser\BuilderFactory;
use PHPUnit\Framework\TestCase;
use Tests\NullDev\Skeleton\CodeGenerator\LolProvider;
use Tests\NullDev\Skeleton\CodeGenerator\SeniorDeveloperProvider;

/**
 * @covers \NullDev\PHPUnitSkeleton\CodeGenerator\PhpParser\Methods\SetUpGenerator
 * @group  nemesis
 */
class SetUpGeneratorTest extends TestCase
{
    use OutputGeneratorTestTrait;

    public function getGenerator(): SetUpGenerator
    {
        return new SetUpGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     * @dataProvider provideParameters2
     */
    public function testOutput(ImprovedClassSource $classSource, string $fileName): void
    {
        $method = new SetUpMethod($classSource);

        $this->assertOutputMatches($method, $fileName);
    }

    public function provideParameters(): array
    {
        $provider = new SeniorDeveloperProvider();

        return [
            [new ImprovedClassSource($provider->provideClassType()), '0-no-param'],
            [$provider->provideSourceWithParent(), '0-no-param'],
            [$provider->provideSourceWithInterface(), '0-no-param'],
            [$provider->provideSourceWithTrait(), '0-no-param'],
            [$provider->provideSourceWithAll(), '0-no-param'],
            [$provider->provideSourceWithAllMulti(), '0-no-param'],
            [$provider->provideSourceWithOneParamConstructor(), '1-type-one-param'],
            [$provider->provideSourceWithTwoParamConstructor(), '2-type-two-params'],
            [$provider->provideSourceWithThreeParamConstructor(), '3-type-three-params'],
            [$provider->provideSourceWithOneClasslessParamConstructor(), '1-no-type-one-param'],
            [$provider->provideSourceWithOneTypeDeclarationParamConstructor(), '1-no-type-one-param'],
        ];
    }

    public function provideParameters2(): array
    {
        $provider = new LolProvider();

        return [
            [$provider->provideAll(), '2-mix-of-parameters'],
        ];
    }
}
