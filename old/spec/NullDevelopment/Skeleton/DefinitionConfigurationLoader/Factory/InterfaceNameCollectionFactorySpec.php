<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory;

use NullDevelopment\PhpStructure\DataTypeName\InterfaceName;
use NullDevelopment\Skeleton\DefinitionConfigurationLoader\Factory\InterfaceNameCollectionFactory;
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
            'MyCompany\\SomeTrait',
            'MyCompany\\AnotherTrait',
        ];

        $resultCollection = $this->create($input);

        foreach ($resultCollection as $result) {
            $result->shouldBeAnInstanceOf(InterfaceName::class);
        }
    }
}
