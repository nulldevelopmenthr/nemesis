<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory;

use NullDevelopment\PhpStructure\DataTypeName\TraitName;
use NullDevelopment\SkeletonSourceCodeExtension\DefinitionLoader\Factory\TraitNameCollectionFactory;
use PhpSpec\ObjectBehavior;

class TraitNameCollectionFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TraitNameCollectionFactory::class);
    }

    public function it_will_convert_list_of_trait_name_strings_to_trait_name_collection()
    {
        $input = [
            'MyVendor\SomeTrait',
            'MyVendor\AnotherTrait',
        ];

        $resultCollection = $this->create($input);

        foreach ($resultCollection as $result) {
            $result->shouldBeAnInstanceOf(TraitName::class);
        }
    }
}
