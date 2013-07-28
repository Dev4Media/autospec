<?php

namespace spec\D4m\AutoSpecExtension;

use PhpSpec\ObjectBehavior;
use PhpSpec\ServiceContainer;
use Prophecy\Argument;

class ExtensionSpec extends ObjectBehavior
{
    function let(ServiceContainer $container)
    {
        $container->setShared(Argument::cetera())->willReturn();
        $container->addConfigurator(Argument::any())->willReturn();
    }

    function it_is_an_extension()
    {
        $this->shouldImplement('PhpSpec\Extension\ExtensionInterface');
    }

    function it_registers_a_console_auto_spec_when_loaded($container)
    {
        $container->setShared('console.commands.auto_spec',
            $this->service('D4m\AutoSpecExtension\Console\Command\AutoSpecCommand', $container)
        )->shouldBeCalled();

        $this->load($container);
    }

    protected function service($class, $container)
    {
        return Argument::that(function ($callback) use ($class, $container) {
            if (is_callable($callback)) {
                $result = $callback($container->getWrappedObject());

                return $result instanceof $class;
            }

            return false;
        });
    }

}
