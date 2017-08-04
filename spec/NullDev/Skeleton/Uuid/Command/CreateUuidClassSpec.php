<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Uuid\Command\CreateUuidClass;
use PhpSpec\ObjectBehavior;

class CreateUuidClassSpec extends ObjectBehavior
{
    public function let(ClassType $classType)
    {
        $this->beConstructedWith('/var/www/somewhere/src/Namespace/ClassName.php', $classType);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateUuidClass::class);
    }

    public function it_will_expose_class_type(ClassType $classType)
    {
        $this->getClassType()->shouldReturn($classType);
    }

    public function it_will_expose_fileName()
    {
        $this->getFileName()->shouldReturn('/var/www/somewhere/src/Namespace/ClassName.php');
    }
}
