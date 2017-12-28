<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\InterfaceNameCollectionFactory;
use PhpSpec\ObjectBehavior;

class InterfaceNameCollectionFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InterfaceNameCollectionFactory::class);
    }

    public function it_will_convert_list_of_interface_name_strings_to_interface_name_collection()
    {
        $input = [
            'MyVendor\SomeTrait',
            'MyVendor\AnotherTrait',
        ];

        $resultCollection = $this->create($input);

        foreach ($resultCollection as $result) {
            $result->shouldBeAnInstanceOf(InterfaceName::class);
        }
    }
}
