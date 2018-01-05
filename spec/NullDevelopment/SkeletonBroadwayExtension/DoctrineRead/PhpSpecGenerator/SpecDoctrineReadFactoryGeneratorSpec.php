<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator;

use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\PhpSpecGenerator\SpecDoctrineReadFactoryGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\InitializableMethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\LetMethodGenerator;
use NullDevelopment\SkeletonPhpSpecExtension\MethodGenerator\SpecGetterMethodGenerator;
use PhpSpec\ObjectBehavior;

class SpecDoctrineReadFactoryGeneratorSpec extends ObjectBehavior
{
    public function let(
        LetMethodGenerator $letMethodGenerator,
        InitializableMethodGenerator $initializableMethodGenerator,
        SpecGetterMethodGenerator $getterSpecMethodGenerator
    ) {
        $letMethodGenerator->getMethodGeneratorPriority()->willReturn(10);
        $initializableMethodGenerator->getMethodGeneratorPriority()->willReturn(20);
        $getterSpecMethodGenerator->getMethodGeneratorPriority()->willReturn(50);
        $this->beConstructedWith([$letMethodGenerator, $initializableMethodGenerator, $getterSpecMethodGenerator]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SpecDoctrineReadFactoryGenerator::class);
    }
}
