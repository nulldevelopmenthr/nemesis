<?php

declare(strict_types=1);

namespace Tests\NullDev\PHPUnitSkeleton;

use App\Application;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery as m;
use NullDev\Nemesis\Config\Config;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Tests\NullDev\AssertOutputTrait;
use Tests\NullDev\Skeleton\CodeGenerator\SeniorDeveloperProvider;

/**
 * @covers \NullDev\PHPUnitSkeleton\PHPUnitTestGenerator
 * @group  codeGeneration
 */
class PHPUnitTestGeneratorTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    use AssertOutputTrait;

    /** @var PHPUnitTestGenerator */
    private $testGenerator;
    /** @var PhpParserGenerator */
    private $phpParserGenerator;
    /** @var ContainerInterface */
    private $container;

    public function setUp(): void
    {
        $this->setUpContainer();

        $config = m::mock(Config::class);
        $config->shouldReceive('getTestsNamespace')->andReturn('Tests');
        $config->shouldReceive('getBaseTestClassName')->andReturn('PHPUnit\Framework\TestCase');

        $this->testGenerator      = new PHPUnitTestGenerator(new ClassSourceFactory(), $config);
        $this->phpParserGenerator = $this->getService(PhpParserGenerator::class);
    }

    /**
     * @dataProvider provideTestRenderData
     */
    public function testNothing(ImprovedClassSource $classSource, string $outputName): void
    {
        $test = $this->testGenerator->generate($classSource);

        $filePath = $this->getFilePath($outputName);
        $this->assertOutputMatches($filePath, $test);
    }

    public function provideTestRenderData(): array
    {
        $provider = new SeniorDeveloperProvider();

        return [
            [new ImprovedClassSource($provider->provideClassType()), 'class'],
            [$provider->provideSourceWithParent(), 'class-with-parent'],
            [$provider->provideSourceWithInterface(), 'class-with-interface'],
            [$provider->provideSourceWithTrait(), 'class-with-trait'],
            [$provider->provideSourceWithAll(), 'class-with-all'],
            [$provider->provideSourceWithAllMulti(), 'class-with-all-multi'],
            [$provider->provideSourceWithOneParamConstructor(), 'class-with-all-1-param'],
            [$provider->provideSourceWithTwoParamConstructor(), 'class-with-all-2-param'],
            [$provider->provideSourceWithThreeParamConstructor(), 'class-with-all-3-param'],
            [$provider->provideSourceWithOneClasslessParamConstructor(), 'class-with-all-1-classless-param'],
            [$provider->provideSourceWithOneTypeDeclarationParamConstructor(), 'class-with-all-1-scalartypes-param'],
        ];
    }

    private function getFilePath(string $exampleName): string
    {
        return __DIR__.'/sample-output/'.$exampleName.'.output';
    }

    public function getService(string $serviceName)
    {
        return $this->getContainer()->get($serviceName);
    }

    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    public function setUpContainer()
    {
        $this->container = (new Application())->getContainer();
    }
}
