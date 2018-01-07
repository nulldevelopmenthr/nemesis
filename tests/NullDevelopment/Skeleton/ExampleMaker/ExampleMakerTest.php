<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\ExampleMaker;

use NullDevelopment\PhpStructure\DataType\SimpleVariable;
use NullDevelopment\PhpStructure\DataType\Variable;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\Skeleton\ExampleMaker\ArrayExample;
use NullDevelopment\Skeleton\ExampleMaker\ArrayExample2;
use NullDevelopment\Skeleton\ExampleMaker\Example;
use NullDevelopment\Skeleton\ExampleMaker\ExampleMaker;
use NullDevelopment\Skeleton\ExampleMaker\InstanceExample;
use NullDevelopment\Skeleton\ExampleMaker\MockeryMockExample;
use NullDevelopment\Skeleton\ExampleMaker\ReflectionFactory;
use NullDevelopment\Skeleton\ExampleMaker\SimpleExample;
use PHPUnit\Framework\TestCase;
use Tests\NullDevelopment\Skeleton\ExampleMaker\TestData\CreatedAt;
use Tests\NullDevelopment\Skeleton\ExampleMaker\TestData\ExampleCollection;
use Tests\NullDevelopment\Skeleton\ExampleMaker\TestData\ExampleInterface;
use Tests\NullDevelopment\Skeleton\ExampleMaker\TestData\ExampleWithoutTypes;
use Tests\NullDevelopment\Skeleton\ExampleMaker\TestData\ExampleWithSingleStaticTypeConstructorParameter;
use Tests\NullDevelopment\Skeleton\ExampleMaker\TestData\ExampleWithStaticTypeConstructorParameters;
use Tests\NullDevelopment\Skeleton\ExampleMaker\TestData\GenericClass;
use Tests\NullDevelopment\Skeleton\ExampleMaker\TestData\NoConstructorClass;

/**
 * @covers \NullDevelopment\Skeleton\ExampleMaker\ExampleMaker
 * @group  unit
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ExampleMakerTest extends TestCase
{
    /** @var ReflectionFactory */
    private $reflectionFactory;

    /** @var ExampleMaker */
    private $exampleMaker;

    public function setUp()
    {
        $this->reflectionFactory = new ReflectionFactory();
        $this->exampleMaker      = new ExampleMaker($this->reflectionFactory);
    }

    /** @dataProvider provideStaticTypesWithoutExamples */
    public function testStaticTypeInstancesWithoutExamples(Variable $input, Example $expected)
    {
        self::assertEquals($expected, $this->exampleMaker->instance($input));
    }

    /** @dataProvider provideStaticTypesWithoutExamples */
    public function testStaticTypeValuesWithoutExamples(Variable $input, Example $expected)
    {
        self::assertEquals($expected, $this->exampleMaker->value($input));
    }

    public function provideStaticTypesWithoutExamples()
    {
        return [
            [SimpleVariable::int('number'), new SimpleExample('1')],
            [SimpleVariable::string('description'), new SimpleExample('description')],
            [SimpleVariable::float('price'), new SimpleExample('2.0')],
            [SimpleVariable::bool('active'), new SimpleExample(true)],
            [SimpleVariable::array('list'), new ArrayExample([new SimpleExample('data')])],
        ];
    }

    public function testDateTimeInstanceWithoutExamples()
    {
        // Arrange
        $className = ClassName::create('DateTime');
        $input     = new SimpleVariable('createdAt', $className);
        $expected  = new InstanceExample($className, [new SimpleExample('2018-01-01T00:01:00+00:00')]);

        // Act
        $result = $this->exampleMaker->instance($input);

        // Assert

        self::assertEquals($expected, $result);
    }

    public function testDateTimeValueWithoutExamples()
    {
        // Arrange
        $input    = new SimpleVariable('createdAt', ClassName::create('DateTime'));
        $expected = new SimpleExample('2018-01-01T00:01:00+00:00');

        // Act
        $result = $this->exampleMaker->value($input);

        // Assert

        self::assertEquals($expected, $result);
    }

    public function testInterfaceInstanceWithoutExamples()
    {
        // Arrange
        $interfaceName = InterfaceName::create(ExampleInterface::class);
        $input         = new SimpleVariable('variableName', $interfaceName);
        $expected      = new MockeryMockExample($interfaceName);

        // Act
        $result = $this->exampleMaker->instance($input);

        // Assert
        self::assertEquals($expected, $result);
    }

    public function testInterfaceValueWithoutExamples()
    {
        // Arrange
        $interfaceName = InterfaceName::create(ExampleInterface::class);
        $input         = new SimpleVariable('variableName', $interfaceName);
        $expected      = new MockeryMockExample($interfaceName);

        // Act
        $result = $this->exampleMaker->value($input);

        // Assert
        self::assertEquals($expected, $result);
    }

    public function testChildOfDateTimeInstanceWithoutExamples()
    {
        // Arrange
        $className = ClassName::create(CreatedAt::class);
        $input     = new SimpleVariable('variableName', $className);
        $expected  = new InstanceExample($className, [new SimpleExample('2018-01-01T00:01:00+00:00')]);

        // Act
        $result = $this->exampleMaker->instance($input);

        // Assert
        self::assertEquals($expected, $result);
    }

    public function testChildOfDateTimeValueWithoutExamples()
    {
        // Arrange
        $input    = new SimpleVariable('variableName', ClassName::create(CreatedAt::class));
        $expected = new SimpleExample('2018-01-01T00:01:00+00:00');

        // Act
        $result = $this->exampleMaker->value($input);

        // Assert
        self::assertEquals($expected, $result);
    }

    public function testClassWithoutConstructorInstanceWithoutExamples()
    {
        // Arrange
        $className = ClassName::create(NoConstructorClass::class);
        $input     = new SimpleVariable('variableName', $className);
        $expected  = new MockeryMockExample($className);

        // Act
        $result = $this->exampleMaker->instance($input);

        // Assert
        self::assertEquals($expected, $result);
    }

    public function testClassWithoutConstructorValueWithoutExamples()
    {
        // Arrange
        $className = ClassName::create(NoConstructorClass::class);
        $input     = new SimpleVariable('variableName', $className);
        $expected  = new MockeryMockExample($className);

        // Act
        $result = $this->exampleMaker->value($input);

        // Assert
        self::assertEquals($expected, $result);
    }

    /** @dataProvider provideClassesWithoutExamples */
    public function testClassInstanceWithoutExamples(Variable $input, Example $expected)
    {
        // Act
        $result = $this->exampleMaker->instance($input);

        // Assert
        self::assertEquals($expected, $result);
    }

    /** @dataProvider provideClassesWithoutExamples2 */
    public function testClassValueWithoutExamples(Variable $input, Example $expected)
    {
        // Act
        $result = $this->exampleMaker->value($input);

        // Assert
        self::assertEquals($expected, $result);
    }

    public function provideClassesWithoutExamples(): array
    {
        $exampleWithStaticTypes      = ClassName::create(ExampleWithStaticTypeConstructorParameters::class);
        $exampleWithSingleStaticType = ClassName::create(ExampleWithSingleStaticTypeConstructorParameter::class);
        $exampleCollection           = ClassName::create(ExampleCollection::class);
        $genericClass                = ClassName::create(GenericClass::class);
        $exampleWithoutTypes         = ClassName::create(ExampleWithoutTypes::class);

        return [
            [
                new SimpleVariable('variableName', $exampleWithStaticTypes),
                new InstanceExample(
                    $exampleWithStaticTypes,
                    [
                        new SimpleExample('1'),
                        new SimpleExample('title'),
                        new SimpleExample('2.0'),
                        new SimpleExample(true),
                        new ArrayExample([new SimpleExample('data')]),
                    ]
                ),
            ],
            [
                new SimpleVariable('variableName', $exampleWithSingleStaticType),
                new InstanceExample(
                    $exampleWithSingleStaticType,
                    [
                        new SimpleExample('title'),
                    ]
                ),
            ],
            [
                new SimpleVariable('variableName', $exampleCollection),
                new InstanceExample(
                    $exampleCollection,
                    [
                        new ArrayExample([new MockeryMockExample($genericClass)]),
                    ]
                ),
            ],
            [
                new SimpleVariable('variableName', $exampleWithoutTypes),
                new InstanceExample(
                    $exampleWithoutTypes,
                    [
                        new SimpleExample('id'),
                        new SimpleExample('title'),
                    ]
                ),
            ],
        ];
    }

    public function provideClassesWithoutExamples2(): array
    {
        $exampleWithStaticTypes      = ClassName::create(ExampleWithStaticTypeConstructorParameters::class);
        $exampleWithSingleStaticType = ClassName::create(ExampleWithSingleStaticTypeConstructorParameter::class);
        $exampleCollection           = ClassName::create(ExampleCollection::class);
        $genericClass                = ClassName::create(GenericClass::class);
        $exampleWithoutTypes         = ClassName::create(ExampleWithoutTypes::class);

        return [
            [
                new SimpleVariable('variableName', $exampleWithStaticTypes),
                new ArrayExample2(
                    [
                        'id'     => new SimpleExample('1'),
                        'title'  => new SimpleExample('title'),
                        'amount' => new SimpleExample('2.0'),
                        'active' => new SimpleExample(true),
                        'tags'   => new ArrayExample([new SimpleExample('data')]),
                    ]
                ),
            ],
            [
                new SimpleVariable('variableName', $exampleWithSingleStaticType),
                new SimpleExample('title'),
            ],
            [
                new SimpleVariable('variableName', $exampleCollection),
                new ArrayExample([new MockeryMockExample($genericClass)]),
            ],
            [
                new SimpleVariable('variableName', $exampleWithoutTypes),
                new ArrayExample2(
                    [
                        'id'    => new SimpleExample('id'),
                        'title' => new SimpleExample('title'),
                    ]
                ),
            ],
        ];
    }
}
