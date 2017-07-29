<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Uuid\Command\CreateUuidSpecification;
use PhpSpec\ObjectBehavior;

class CreateUuidSpecificationSpec extends ObjectBehavior
{
    public function let(ClassType $classType)
    {
        $this->beConstructedWith('/var/www/somewhere/spec/Namespace/ClassNameSpec.php', $classType);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateUuidSpecification::class);
    }

    public function it_will_expose_class_type(ClassType $classType)
    {
        $this->getClassType()->shouldReturn($classType);
    }

    public function it_will_expose_fileName()
    {
        $this->getFileName()->shouldReturn('/var/www/somewhere/spec/Namespace/ClassNameSpec.php');
    }
}
