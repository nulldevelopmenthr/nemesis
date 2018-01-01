<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator;

use NullDevelopment\SkeletonPhpSpecExtension\DefinitionGenerator\SpecSimpleEntityGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\InitializableMethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\LetMethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecGetterMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecSimpleEntityGeneratorSpec extends ObjectBehavior
{
    public function let(
        LetMethodGenerator $letMethodGenerator,
        InitializableMethodGenerator $initializableMethodGenerator,
        SpecGetterMethodGenerator $getterSpecMethodGenerator
    ) {
        $this->beConstructedWith([$letMethodGenerator, $initializableMethodGenerator, $getterSpecMethodGenerator]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSimpleEntityGenerator::class);
    }
}
