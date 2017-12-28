<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\DefinitionFactory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpSpec\Definition\SpecDateTimeValueObject;
use NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecDateTimeValueObjectFactory;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeCreateFromFormatMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeDeserializeMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeLetMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeSerializeMethod;
use NullDevelopment\Skeleton\PhpSpec\Method\SpecDateTimeToStringMethod;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeCreateFromFormatMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeSerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeToStringMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\DefinitionFactory\SpecDateTimeValueObjectFactory
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
                    ]
                ),
            ],
        ];
    }
}
