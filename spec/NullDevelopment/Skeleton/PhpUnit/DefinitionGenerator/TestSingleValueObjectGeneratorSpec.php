<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator;

use NullDevelopment\Skeleton\PhpUnit\DefinitionGenerator\TestSingleValueObjectGenerator;
use NullDevelopment\Skeleton\PhpUnit\MethodGenerator\SetUpMethodGenerator;
use NullDevelopment\Skeleton\PhpUnit\MethodGenerator\TestGetterMethodGenerator;
use PhpSpec\ObjectBehavior;

class TestSingleValueObjectGeneratorSpec extends ObjectBehavior
{
    public function let(
        SetUpMethodGenerator $setUpMethodGenerator,

        TestGetterMethodGenerator $testGetterMethodGenerator
    ) {
        $this->beConstructedWith([$setUpMethodGenerator, $testGetterMethodGenerator]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSingleValueObjectGenerator::class);
    }
}
