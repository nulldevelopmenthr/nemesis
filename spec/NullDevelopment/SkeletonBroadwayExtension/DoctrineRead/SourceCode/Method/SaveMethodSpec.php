<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\DoctrineRead\SourceCode\Method\SaveMethod;
use PhpSpec\ObjectBehavior;

class SaveMethodSpec extends ObjectBehavior
{
    public function let(ClassName $entity)
    {
        $this->beConstructedWith($entity);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SaveMethod::class);
        $this->shouldImplement(Method::class);
    }
}
