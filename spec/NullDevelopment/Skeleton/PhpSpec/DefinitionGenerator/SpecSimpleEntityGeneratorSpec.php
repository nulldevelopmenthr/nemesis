<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator;

use NullDevelopment\Skeleton\PhpSpec\DefinitionGenerator\SpecSimpleEntityGenerator;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\GetterSpecMethodGenerator;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\InitializableMethodGenerator;
use NullDevelopment\Skeleton\PhpSpec\MethodGenerator\LetMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecSimpleEntityGeneratorSpec extends ObjectBehavior
{
    public function let(
        LetMethodGenerator $letMethodGenerator,
        InitializableMethodGenerator $initializableMethodGenerator,
        GetterSpecMethodGenerator $getterSpecMethodGenerator
    ) {
        $this->beConstructedWith([$letMethodGenerator, $initializableMethodGenerator, $getterSpecMethodGenerator]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecSimpleEntityGenerator::class);
    }
}
