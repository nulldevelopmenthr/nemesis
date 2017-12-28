<?php

declare(strict_types=1);

namespace Tests\NullDev\Skeleton\CodeGenerator;

use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Source\ImprovedClassSource;
use Tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\Skeleton\CodeGenerator\PhpParserGenerator
 * @group  integration
 */
class PhpParserGeneratorTest extends ContainerSupportedTestCase
{
    /**
     * @test
     * @dataProvider provideTestRenderData
     */
    public function outputClass(ImprovedClassSource $classSource, string $outputName): void
    {
        $generator = $this->getService(PhpParserGenerator::class);

        $this->assertSame($this->getFileContent($outputName), $generator->getOutput($classSource));
    }

    public function provideTestRenderData(): array
    {
        $provider = new SeniorDeveloperProvider();

        return [
            [new ImprovedClassSource($provider->provideClassType()), 'code/class'],
            [$provider->provideSourceWithParent(), 'code/class-with-parent'],
            [$provider->provideSourceWithInterface(), 'code/class-with-interface'],
            [$provider->provideSourceWithTrait(), 'code/class-with-trait'],
            [$provider->provideSourceWithAll(), 'code/class-with-all'],
            [$provider->provideSourceWithAllMulti(), 'code/class-with-all-multi'],
            [$provider->provideSourceWithOneParamConstructor(), 'code/class-with-all-1-param'],
            [$provider->provideSourceWithTwoParamConstructor(), 'code/class-with-all-2-param'],
            [$provider->provideSourceWithThreeParamConstructor(), 'code/class-with-all-3-param'],
            [$provider->provideSourceWithOneClasslessParamConstructor(), 'code/class-with-all-1-classless-param'],
            [$provider->provideSourceWithOneTypeDeclarationParamConstructor(), 'code/class-with-all-1-scalartypes-param'],
        ];
    }

    protected function getFileContent(string $fileName): string
    {
        return file_get_contents(__DIR__.'/sample-output/'.$fileName.'.output');
    }
}
