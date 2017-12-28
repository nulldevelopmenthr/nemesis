<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\DefinitionConfigurationLoader;

use Generator;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\DateTimeValueObjectLoader;
use Tests\TestCase\SfTestCase;

/**
 * @group application
 * @coversNothing
 */
class DateTimeValueObjectLoaderTest extends SfTestCase
{
    /** @var DateTimeValueObjectLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(DateTimeValueObjectLoader::class);
    }

    /**
     * @dataProvider provideFullyDefinedInput
     * @dataProvider provideMinimallyDefinedInput
     */
    public function testLoader(array $inputConfig)
    {
        // Act
        $result = $this->sut->load($inputConfig);

        // Assert expected instance was returned
        self::assertInstanceOf(DateTimeValueObject::class, $result);

        // Assert name
        self::assertEquals(ClassName::createFromFullyQualified('MyVendor\\User\\UserCreatedAt'), $result->getName());

        // Has DateTime as a parent
        self::assertTrue($result->hasParent());
        self::assertEquals(new ClassName('DateTime'), $result->getParent());

        // No interfaces
        self::assertFalse($result->hasInterfaces());
        self::assertEmpty($result->getInterfaces());

        // No traits
        self::assertFalse($result->hasTraits());
        self::assertEmpty($result->getTraits());

        // No constructor
        self::assertFalse($result->hasConstructorMethod());
        self::assertNull($result->getConstructorMethod());

        // Has no properties
        self::assertFalse($result->hasProperties());
        self::assertCount(0, $result->getProperties());
    }

    public function provideFullyDefinedInput(): Generator
    {
        $input1 = [
            'type'         => 'DateTimeValueObject',
            'instanceOf'   => 'MyVendor\\User\\UserCreatedAt',
            'parent'       => 'DateTime',
            'interfaces'   => [],
            'traits'       => [],
            'constructor'  => [],
        ];

        yield [$input1];
    }

    public function provideMinimallyDefinedInput(): Generator
    {
        $input1 = [
            'type'       => 'DateTimeValueObject',
            'instanceOf' => 'MyVendor\\User\\UserCreatedAt',
        ];

        yield [$input1];
    }

    /** @dataProvider provideInput */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInput */
    public function testLoad(array $input)
    {
        self::assertInstanceOf(DateTimeValueObject::class, $this->sut->load($input));
    }

    /** @dataProvider provideInput */
    public function testToArrayOnDefinitionWorks(array $input)
    {
        $definition = $this->sut->load($input);

        self::assertEquals($input, $definition->toArray()['definition']);
    }

    public function provideInput(): array
    {
        return [
            [$this->loadDefinitionYaml('MyVendor/User/UserCreatedAt.yaml')],
        ];
    }
}
