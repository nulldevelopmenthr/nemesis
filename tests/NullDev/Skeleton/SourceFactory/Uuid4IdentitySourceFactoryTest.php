<?php

declare(strict_types=1);

namespace tests\NullDev\Skeleton\SourceFactory;

use NullDev\Skeleton\CodeGenerator\PhpParserGenerator;
use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Source\ClassSourceFactory;
use NullDev\Skeleton\SourceFactory\Uuid4IdentitySourceFactory;
use tests\NullDev\ContainerSupportedTestCase;

/**
 * @covers \NullDev\Skeleton\SourceFactory\Uuid4IdentitySourceFactory
 * @group  integration
 */
class Uuid4IdentitySourceFactoryTest extends ContainerSupportedTestCase
{
    /** @var Uuid4IdentitySourceFactory */
    private $sourceFactory;
    /** @var PhpParserGenerator */
    private $codeGenerator;

    public function setUp(): void
    {
        $this->sourceFactory = new Uuid4IdentitySourceFactory(new ClassSourceFactory());
        $this->codeGenerator = $this->getService(PhpParserGenerator::class);
    }

    /**
     * @dataProvider provideData
     */
    public function testOutput(ClassType $inputClassType, string $expected): void
    {
        $source = $this->sourceFactory->create($inputClassType);
        $output = $this->codeGenerator->getOutput($source);

        self::assertEquals($expected, $output);
    }

    public function provideData(): \Generator
    {
        $data = [
            'Vendor\Namespace\SomeId' => 'SomeId',
        ];

        foreach ($data as $className => $fileName) {
            yield [
                ClassType::createFromFullyQualified($className),
                file_get_contents(__DIR__.'/sample-output/'.$fileName.'.output'),
            ];
        }
    }
}
