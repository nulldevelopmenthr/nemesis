<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator;

use NullDevelopment\SkeletonPhpUnitExtension\DefinitionGenerator\TestSimpleEntityGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\SetUpMethodGenerator;
use NullDevelopment\SkeletonPhpUnitExtension\MethodGenerator\TestGetterMethodGenerator;
use PhpSpec\ObjectBehavior;

class TestSimpleEntityGeneratorSpec extends ObjectBehavior
{
    public function let(
        SetUpMethodGenerator $setUpMethodGenerator,
        TestGetterMethodGenerator $testGetterMethodGenerator
    ) {
        $setUpMethodGenerator->getMethodGeneratorPriority()->willReturn(10);
        $testGetterMethodGenerator->getMethodGeneratorPriority()->willReturn(50);
        $this->beConstructedWith([$setUpMethodGenerator, $testGetterMethodGenerator]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestSimpleEntityGenerator::class);
    }
}
