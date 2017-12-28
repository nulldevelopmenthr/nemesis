<?php

declare(strict_types=1);

namespace spec\NullDevelopment\Skeleton\PhpUnit\Method;

use NullDevelopment\PhpStructure\DataTypeName\ClassName;
use NullDevelopment\Skeleton\PhpUnit\Method\TestDateTimeDeserializeMethod;
use PhpSpec\ObjectBehavior;

class TestDateTimeDeserializeMethodSpec extends ObjectBehavior
{
    public function let(ClassName $className)
    {
        $this->beConstructedWith($className);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestDateTimeDeserializeMethod::class);
    }
}
