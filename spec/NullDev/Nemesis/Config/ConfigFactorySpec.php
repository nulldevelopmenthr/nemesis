<?php

declare(strict_types=1);

namespace spec\NullDev\Nemesis\Config;

use NullDev\Nemesis\Config\Config;
use NullDev\Nemesis\Config\ConfigFactory;
use PhpSpec\ObjectBehavior;

class ConfigFactorySpec extends ObjectBehavior
{
    public function let()
    {
        $input = [
            'paths' => [
                'code'  => ['src/' => ''],
                'tests' => ['tests/' => 'tests\\'],
            ],
        ];
        $this->beConstructedWith($input);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(ConfigFactory::class);
    }

    public function it_will_create_config_file()
    {
        $this->create()
            ->shouldReturnAnInstanceOf(Config::class);
    }
}
