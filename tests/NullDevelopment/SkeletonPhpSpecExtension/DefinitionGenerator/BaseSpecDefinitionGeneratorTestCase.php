<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use App\Application;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Path\Readers\FinderFactory;
use NullDev\Skeleton\Source\ImprovedClassSource;
use NullDevelopment\Skeleton\Core\DefinitionLoaderCollection;
use PHPUnit\Framework\TestCase;
use SplFileInfo;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;
use Tests\NullDev\AssertOutputTrait;

/** @SuppressWarnings("PHPMD.NumberOfChildren") */
abstract class BaseSpecDefinitionGeneratorTestCase extends TestCase
{
    use AssertOutputTrait;

    protected $sut;

    /** @var ContainerInterface */
    protected static $container;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        self::$container = (new Application())->getContainer();
        $this->initializeSubjectUnderTest();
    }

    abstract protected function initializeSubjectUnderTest();

    protected function getService(string $serviceName)
    {
        return self::$container->get($serviceName);
    }

    protected function getCodeGenerator(): PhpParserGenerator
    {
        return $this->getService(PhpParserGenerator::class);
    }

    protected function assertClassSourceOutputMatches(string $outputFilePath, ImprovedClassSource $classSource)
    {
        $generatedOutput = $this->getCodeGenerator()->getOutput($classSource);

        $this->assertOutputContentMatches($outputFilePath, $generatedOutput);
    }

    protected function loadAllDefinitionsFromFiles(): array
    {
        $path    = getcwd().'/definitions';
        $yamls   = $this->getService(FinderFactory::class)->create()->files()->in($path)->name('*.yaml');
        $loaders = $this->getService(DefinitionLoaderCollection::class);

        $classDefinitions = [];

        /** @var SplFileInfo $yaml */
        foreach ($yamls as $yaml) {
            // Load Yaml file content
            $fileContent = file_get_contents($yaml->getPath().'/'.$yaml->getFilename());

            // Parse content
            $parsedYaml = Yaml::parse($fileContent);

            $classDefinitions[] = $loaders->findAndLoad($parsedYaml['definition']);
        }

        return $classDefinitions;
    }
}
