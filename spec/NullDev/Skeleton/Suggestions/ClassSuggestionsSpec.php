<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Suggestions;

use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use NullDev\Skeleton\Suggestions\ClassSuggestions;
use PhpSpec\ObjectBehavior;

class ClassSuggestionsSpec extends ObjectBehavior
{
    public function let(SourceCodePathReader $pathReader)
    {
        $this->beConstructedWith($pathReader);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ClassSuggestions::class);
    }

    public function it_will_suggest_namespace(SourceCodePathReader $pathReader)
    {
        $input = [
            'Vendor\\',
            'Vendor\\Namespace\\',
            'Vendor\\Namespace\\Product\\Product',
            'Vendor\\Namespace\\Product\\ProductId',
            'Vendor\\Namespace\\User\\',
            'Vendor\\Namespace\\User\\User',
        ];

        $pathReader->getExistingSourceCodeClassNames()
            ->shouldBeCalled()
            ->willReturn($input);

        $expected = [
            'Vendor/',
            'Vendor/Namespace/',
            'Vendor/Namespace/Product/Product',
            'Vendor/Namespace/Product/ProductId',
            'Vendor/Namespace/User/',
            'Vendor/Namespace/User/User',
        ];

        $this->suggest()->shouldReturn($expected);
    }
}
