<?php

declare(strict_types=1);

namespace spec\NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\Method;

use NullDevelopment\PhpStructure\Behaviour\Method;
use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\SkeletonBroadwayExtension\CommandHandler\SourceCode\Method\LoadMethod;
use PhpSpec\ObjectBehavior;

class LoadMethodSpec extends ObjectBehavior
{
    public function let(ClassName $model, ClassName $modelId)
    {
        $this->beConstructedWith($model, $modelId);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(LoadMethod::class);
        $this->shouldImplement(Method::class);
    }
}
