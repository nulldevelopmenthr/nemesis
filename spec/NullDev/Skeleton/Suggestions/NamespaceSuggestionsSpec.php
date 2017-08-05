<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Suggestions;

use NullDev\Skeleton\Path\Readers\SourceCodePathReader;
use NullDev\Skeleton\Suggestions\NamespaceSuggestions;
use PhpSpec\ObjectBehavior;

class NamespaceSuggestionsSpec extends ObjectBehavior
{
    public function let(SourceCodePathReader $pathReader)
    {
        $this->beConstructedWith($pathReader);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(NamespaceSuggestions::class);
    }

    public function it_will_suggest_namespace(SourceCodePathReader $pathReader)
    {
        $input = [
            'Vendor\\',
            'Vendor\\Namespace\\',
            'Vendor\\Namespace\\Product\\',
            'Vendor\\Namespace\\User\\',
        ];

        $pathReader->getExistingSourceCodeNamespaces()
            ->shouldBeCalled()
            ->willReturn($input);

        $this->suggest()->shouldReturn($input);
    }
}
