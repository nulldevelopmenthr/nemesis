<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeCreateFromFormatMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeSerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeToStringMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Definition\SpecDateTimeValueObject;
use NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecDateTimeValueObjectFactory;
use NullDevelopment\SkeletonPhpSpecExtension\Method\InitializableMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeCreateFromFormatMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeDeserializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeLetMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeSerializeMethod;
use NullDevelopment\SkeletonPhpSpecExtension\Method\SpecDateTimeToStringMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\SkeletonPhpSpecExtension\DefinitionFactory\SpecDateTimeValueObjectFactory
 * @group  integration
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class SpecDateTimeValueObjectFactoryTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;

    /** @var SpecDateTimeValueObjectFactory */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(SpecDateTimeValueObjectFactory::class);
    }

    /** @dataProvider provideSamples */
    public function testCreateFromDateTimeValueObject(DateTimeValueObject $definition, SpecDateTimeValueObject $expected)
    {
        self::assertEquals($expected, $this->sut->createFromDateTimeValueObject($definition));
    }

    public function provideSamples()
    {
        $className = ClassName::create('MyVendor\\User\\UserCreatedAt');

        return [
            [
                new DateTimeValueObject(
                    $className,
                    ClassName::create('DateTime'),
                    [],
                    [],
                    [],
                    [
                        new DateTimeToStringMethod(),
                        new DateTimeCreateFromFormatMethod(),
                        new DateTimeSerializeMethod(),
                        new DateTimeDeserializeMethod($className),
                    ]
                ),
                new SpecDateTimeValueObject(
                    ClassName::create('spec\\MyVendor\\User\\UserCreatedAtSpec'),
                    ClassName::create('PhpSpec\\ObjectBehavior'),
                    [],
                    [],
                    [],
                    [
                        new SpecDateTimeLetMethod(),
                        new InitializableMethod(
                            ClassName::create('MyVendor\\User\\UserCreatedAt'),
                            ClassName::create('DateTime'),
                            []
                        ),
                        new SpecDateTimeToStringMethod(),
                        new SpecDateTimeCreateFromFormatMethod(),
                        new SpecDateTimeSerializeMethod(),
                        new SpecDateTimeDeserializeMethod($className),
                    ],
                    $className
                ),
            ],
        ];
    }
}
