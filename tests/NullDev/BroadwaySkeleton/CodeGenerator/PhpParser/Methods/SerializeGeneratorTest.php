<?php

declare(strict_types=1);

namespace Tests\NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods;

use NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\SerializeGenerator;
use NullDev\BroadwaySkeleton\Definition\PHP\Methods\SerializeMethod;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpParser\BuilderFactory;
use Tests\NullDev\Skeleton\CodeGenerator\LolProvider;
use Tests\NullDev\Skeleton\CodeGenerator\PhpParser\Methods\BaseOutputGeneratorTestCase;
use Tests\NullDev\Skeleton\CodeGenerator\SeniorDeveloperProvider;

/**
 * @covers \NullDev\BroadwaySkeleton\CodeGenerator\PhpParser\Methods\SerializeGenerator
 * @group  nemesis
 */
class SerializeGeneratorTest extends BaseOutputGeneratorTestCase
{
    public function getGenerator(): SerializeGenerator
    {
        return new SerializeGenerator(new BuilderFactory());
    }

    /**
     * @dataProvider provideParameters
     * @dataProvider provideParameters2
     */
    public function testOutput(ImprovedClassSource $classSource, string $fileName): void
    {
        $method = new SerializeMethod($classSource);

        $this->assertMethodOutputMatches($method, $fileName);
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

    public function getBasePath(): string
    {
        $fullName = explode('\\', get_class($this));

        $currentTestClassName = array_pop($fullName);

        return __DIR__.'/sample-output/'.$currentTestClassName;
    }
}
