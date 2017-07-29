<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery as m;
use NullDev\Nemesis\Application;
use NullDev\Nemesis\Config\Config;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use tests\NullDev\Skeleton\CodeGenerator\SeniorDeveloperProvider;

/**
 * @covers \NullDev\PHPUnitSkeleton\PHPUnitTestGenerator
 * @group  codeGeneration
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PHPUnitTestGeneratorTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
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
        $config->shouldReceive('getTestsNamespace')->andReturn('tests');
        $config->shouldReceive('getBaseTestClassName')->andReturn('PHPUnit_Framework_TestCase');

        $this->testGenerator      = new PHPUnitTestGenerator(new ClassSourceFactory(), $config);
        $this->phpParserGenerator = $this->getService(PhpParserGenerator::class);
    }

    /**
     * @dataProvider provideTestRenderData
     */
    public function testNothing(ImprovedClassSource $classSource, string $outputName): void
    {
        $test = $this->testGenerator->generate($classSource);

        $this->assertSame($this->getFileContent($outputName), $this->phpParserGenerator->getOutput($test));
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

    protected function getFileContent(string $fileName): string
    {
        return file_get_contents(__DIR__.'/example-outputs/'.$fileName.'.output');
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
