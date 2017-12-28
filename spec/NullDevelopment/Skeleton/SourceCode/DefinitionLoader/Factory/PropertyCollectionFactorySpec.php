<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory;

use NullDevelopment\PhpStructure\DataType\Property;
use NullDevelopment\PhpStructure\DataType\Visibility;
use NullDevelopment\Skeleton\SourceCode\DefinitionLoader\Factory\PropertyCollectionFactory;
use PhpSpec\ObjectBehavior;

class PropertyCollectionFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(PropertyCollectionFactory::class);
    }

    public function it_will_create_collection_of_properties()
    {
        $input = [
            'id'        => [
                'instanceOf' => 'integer',
            ],
            'name'      => [
                'instanceOf' => 'string',
            ],
            'something' => [
                'instanceOf' => 'integer',
                'nullable'   => true,
                'hasDefault' => false,
                'default'    => null,
                'visibility' => Visibility::PRIVATE,
            ],
            'another'   => [
                'instanceOf' => 'integer',
                'nullable'   => false,
                'hasDefault' => true,
                'default'    => 7,
                'visibility' => Visibility::PRIVATE,
            ],
        ];

        $resultCollection = $this->create($input);

        foreach ($resultCollection as $result) {
            $result->shouldBeAnInstanceOf(Property::class);
        }
    }
}
