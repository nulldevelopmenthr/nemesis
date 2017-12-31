<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleIdentifierGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\SetUpMethodGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestGetterMethodGenerator;
use PhpSpec\ObjectBehavior;

class TestSimpleIdentifierGeneratorSpec extends ObjectBehavior
{
    public function let(
        SetUpMethodGenerator $setUpMethodGenerator,
        TestGetterMethodGenerator $testGetterMethodGenerator
    ) {
        $this->beConstructedWith([$setUpMethodGenerator, $testGetterMethodGenerator]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSimpleIdentifierGenerator::class);
    }
}
