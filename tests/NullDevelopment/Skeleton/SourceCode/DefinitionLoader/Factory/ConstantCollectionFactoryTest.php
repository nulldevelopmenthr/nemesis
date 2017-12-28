<?php

declare(strict_types=1);

namespace Tests\NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstantCollectionFactory;
use PHPUnit\Framework\TestCase;

/**
 * @covers \NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\ConstantCollectionFactory
 * @group  unit
 */
class ConstantCollectionFactoryTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var ConstantCollectionFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new ConstantCollectionFactory();
    }

    public function testCreate()
    {
        $input = [
            'SOMETHING' => 123,
            'NAME'      => 'some string',
            'TAX'       => 2.5,
            'VALUABLE'  => true,
        ];

        $resultCollection = $this->sut->create($input);

        self::assertCount(4, $resultCollection);

        self::assertContainsOnlyInstancesOf(Constant::class, $resultCollection);
    }
}
