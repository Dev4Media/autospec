<?php

namespace D4m\AutoSpecExtension;

use D4m\AutoSpecExtension\Console\Command\AutoSpecCommand;
use Lurker\ResourceWatcher;
use PhpSpec\Extension\ExtensionInterface;
use PhpSpec\ServiceContainer;

class Extension implements ExtensionInterface
{
    /**
     * @param ServiceContainer $container
     */
    public function load(ServiceContainer $container)
    {
       $container->setShared('console.commands.auto_spec',
           function($c) {
               return new AutoSpecCommand();
           }
       );
    }
}