<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory;

use NullDevelopment\PhpStructure\DataType\Constant;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\ConstantCollectionFactory;
use PhpSpec\ObjectBehavior;

class ConstantCollectionFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ConstantCollectionFactory::class);
    }

    public function it_will_convert_list_of_constant_list_to_constant_collection()
    {
        $input = [
            'SOMETHING' => 123,
            'NAME'      => 'some string',
            'TAX'       => 2.5,
            'VALUABLE'  => true,
        ];

        $resultCollection = $this->create($input);

        foreach ($resultCollection as $result) {
            $result->shouldBeAnInstanceOf(Constant::class);
        }
    }
}
