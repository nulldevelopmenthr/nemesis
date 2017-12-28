<?php

declare(strict_types=1);

namespace Tests\NullDev;

use App\Application;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class ContainerSupportedTestCase extends TestCase
{
    use AssertOutputTrait;

    /** @var ContainerInterface */
    private static $container;

    public static function setUpBeforeClass()
    {
        self::$container = (new Application())->getContainer();
    }

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
}
