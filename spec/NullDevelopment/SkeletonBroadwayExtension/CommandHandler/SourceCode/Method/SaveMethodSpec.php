<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\Method\SaveMethod;
use PhpSpec\ObjectBehavior;

class SaveMethodSpec extends ObjectBehavior
{
    public function let(ClassName $model)
    {
        $this->beConstructedWith($model);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(SaveMethod::class);
        $this->shouldImplement(Method::class);
    }
}
