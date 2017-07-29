<?php

declare(strict_types=1);

namespace tests\NullDev\PhpSpecSkeleton;

use NullDev\PhpSpecSkeleton\SpecGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Source\ImprovedClassSource;
use tests\NullDev\ContainerSupportedTestCase;
use tests\NullDev\Skeleton\CodeGenerator\SeniorDeveloperProvider;

/**
 * @covers \NullDev\PhpSpecSkeleton\SpecGenerator
 * @group  codeGeneration
 */
class SpecGeneratorTest extends ContainerSupportedTestCase
{
    /** @var SpecGenerator */
    private $specGenerator;
    /** @var PhpParserGenerator */
    private $phpParserGenerator;

    public function setUp(): void
    {
        $this->specGenerator      = $this->getService(SpecGenerator::class);
        $this->phpParserGenerator = $this->getService(PhpParserGenerator::class);
    }

    /**
     * @dataProvider provideTestRenderData
     */
    public function testNothing(ImprovedClassSource $classSource, string $outputName): void
    {
        $test = $this->specGenerator->generate($classSource);

        $this->assertSame($this->getFileContent($outputName), $this->phpParserGenerator->getOutput($test));
    }

    public function provideTestRenderData(): array
    {
        $provider = new SeniorDeveloperProvider();

        return [
            [new ImprovedClassSource($provider->provideClassType()), 'class-spec'],
            [$provider->provideSourceWithParent(), 'class-with-parent-spec'],
            [$provider->provideSourceWithInterface(), 'class-with-interface-spec'],
            [$provider->provideSourceWithTrait(), 'class-with-trait-spec'],
            [$provider->provideSourceWithAll(), 'class-with-all-spec'],
            [$provider->provideSourceWithAllMulti(), 'class-with-all-multi-spec'],
            [$provider->provideSourceWithOneParamConstructor(), 'class-with-all-1-param-spec'],
            [$provider->provideSourceWithTwoParamConstructor(), 'class-with-all-2-param-spec'],
            [$provider->provideSourceWithThreeParamConstructor(), 'class-with-all-3-param-spec'],
            [$provider->provideSourceWithOneClasslessParamConstructor(), 'class-with-all-1-classless-param-spec'],
            [$provider->provideSourceWithOneTypeDeclarationParamConstructor(), 'class-with-all-1-scalartypes-param-spec'],
        ];
    }

    protected function getFileContent(string $fileName): string
    {
        return file_get_contents(__DIR__.'/example-outputs/'.$fileName.'.output');
    }
}
