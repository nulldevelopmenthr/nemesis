<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionLoader;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\SourceCode\Definition\DateTimeValueObject;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\DateTimeValueObjectLoader;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeCreateFromFormatMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeDeserializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeSerializeMethod;
use NullDevelopment\Skeleton\SourceCode\Method\DateTimeToStringMethod;
use Tests\TestCase\SfTestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoader\DateTimeValueObjectLoader
 * @group  integration
 */
class DateTimeValueObjectLoaderTest extends SfTestCase
{
    use MockeryPHPUnitIntegration;
    /** @var DateTimeValueObjectLoader */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = $this->getService(DateTimeValueObjectLoader::class);
    }

    /** @dataProvider provideInputs */
    public function testSupports(array $input)
    {
        self::assertTrue($this->sut->supports($input));
    }

    /** @dataProvider provideInputs */
    public function testLoad(array $input, DateTimeValueObject $expected)
    {
        self::assertEquals($expected, $this->sut->load($input));
    }

    public function testGetDefaultValues()
    {
        $expected = [
            'type'       => 'DateTimeValueObject',
            'instanceOf' => null,
            'parent'     => '\DateTime',
            'interfaces' => [],
            'traits'     => [],
        ];

        $this->assertEquals($expected, $this->sut->getDefaultValues());
    }

    public function provideInputs(): array
    {
        $className = ClassName::create('MyVendor\User\UserCreatedAt');

        return [
            [
                [
                    'type'       => 'DateTimeValueObject',
                    'instanceOf' => 'MyVendor\User\UserCreatedAt',
                ],
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
            ],
        ];
    }
}
