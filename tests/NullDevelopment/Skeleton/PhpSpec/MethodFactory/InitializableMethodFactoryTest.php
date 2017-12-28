<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\PhpSpec\MethodFactory;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\PhpStructure\Type\ClassType;
use NullDevelopment\Skeleton\PhpSpec\Method\InitializableMethod;
use NullDevelopment\Skeleton\PhpSpec\MethodFactory\InitializableMethodFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\PhpSpec\MethodFactory\InitializableMethodFactory
 * @group  unit
 */
class InitializableMethodFactoryTest extends TestCase
{
    /** @var InitializableMethodFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new InitializableMethodFactory();
    }

    /** @dataProvider provideSourceCodeDefinitions */
    public function testCreateFromConstructorMethod(ClassType $definition)
    {
        $result = $this->sut->create($definition);

        self::assertCount(1, $result);
        self::assertContainsOnlyInstancesOf(InitializableMethod::class, $result);
    }

    public function provideSourceCodeDefinitions(): array
    {
        $definition = new ClassType(ClassName::create('MyVendor\\User\\UserFirstName'), null, [], [], [], []);

        return [
            [$definition],
        ];
    }
}
