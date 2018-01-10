<?php

declare(strict_types=1);

namespace spec\NullDev\Skeleton\File;

use NullDev\Skeleton\File\OutputResource;
use NullDev\Skeleton\Source\ImprovedClassSource;
use PhpSpec\ObjectBehavior;

class OutputResourceSpec extends ObjectBehavior
{
    public function let(ImprovedClassSource $classSource)
    {
        $this->beConstructedWith(
            $filename = '/var/www/src/MyCompany/ClassName.php', $classSource, $output = '<?php ...'
        );
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(OutputResource::class);
    }

    public function it_exposes_file_name()
    {
        $this->getFileName()->shouldReturn('/var/www/src/MyCompany/ClassName.php');
    }

    public function it_exposes_class_source(ImprovedClassSource $classSource)
    {
        $this->getClassSource()->shouldReturn($classSource);
    }

    public function it_exposes_output()
    {
        $this->getOutput()->shouldReturn('<?php ...');
    }
}
