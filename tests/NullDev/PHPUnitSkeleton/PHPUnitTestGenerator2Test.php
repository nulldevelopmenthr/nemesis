<?php

declare(strict_types=1);

namespace tests\NullDev\PHPUnitSkeleton;

use MyCompany\Entity;
use MyCompany\SecretProject;
use MyCompany\ValueObject;
use NullDev\Nemesis\SourceParser\ReflectionSourceParser;
use NullDev\PHPUnitSkeleton\PHPUnitTestGenerator;
use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ImprovedClassSource;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @group  codeGeneration
 * @coversNothing
 */
class PHPUnitTestGenerator2Test extends ContainerSupportedTestCase
{
    /**
     * @dataProvider provideClasses
     */
    public function testOutput(string $className)
    {
        $classSource = $this->parseSourceClass($className);
        $testSource  = $this->createPhpUnit5Source($classSource);

        $result = $this->getService(PhpParserGenerator::class)->getOutput($testSource);

        $filePath = $this->getFilePath($className);

        if (false === file_exists($filePath)) {
            file_put_contents($filePath, $result);
        }

        self::assertStringEqualsFile($filePath, $result);
    }

    public function provideClasses(): array
    {
        return [
            [SecretProject\EmptyClass::class],
            [ValueObject\EmailAddress::class],
            [ValueObject\ShoeSize::class],
            [ValueObject\Latitude::class],
            [ValueObject\ListOfSomeKind::class],
            //[Entity\TransactionEntity::class],
        ];
    }

    private function parseSourceClass(string $className): ImprovedClassSource
    {
        $sourceParser = $this->getService(ReflectionSourceParser::class);

        $input = new ImprovedClassSource(ClassType::createFromFullyQualified($className));

        return $sourceParser->parseClass($input);
    }

    private function createPhpUnit5Source(ImprovedClassSource $classSource): ImprovedClassSource
    {
        $generator = $this->getService(PHPUnitTestGenerator::class);

        return $generator->generate($classSource);
    }

    private function getFilePath(string $className): string
    {
        return __DIR__.'/sample-output/'.str_replace('\\', '_', $className).'.output';
    }
}
