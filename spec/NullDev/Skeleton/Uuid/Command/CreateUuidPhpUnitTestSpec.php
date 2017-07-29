<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\Uuid\Command;

use NullDev\Skeleton\Definition\PHP\Types\ClassType;
use NullDev\Skeleton\Uuid\Command\CreateUuidPhpUnitTest;
use PhpSpec\ObjectBehavior;

class CreateUuidPhpUnitTestSpec extends ObjectBehavior
{
    public function let(ClassType $classType)
    {
        $this->beConstructedWith('/var/www/somewhere/tests/Namespace/ClassNameTest.php', $classType);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CreateUuidPhpUnitTest::class);
    }

    public function it_will_expose_class_type(ClassType $classType)
    {
        $this->getClassType()->shouldReturn($classType);
    }

    public function it_will_expose_fileName()
    {
        $this->getFileName()->shouldReturn('/var/www/somewhere/tests/Namespace/ClassNameTest.php');
    }
}
