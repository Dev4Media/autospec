<?php
/**
 * @author: Raul Rodriguez - raulrodriguez782@gmail.com
 * @created: 7/27/13 - 4:22 PM
 * 
 */
namespace D4m\AutoSpecExtension\Console\Command;

use Lurker\ResourceWatcher;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class AutoSpecCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('autospec:run')
            ->setDescription('AutoSpec mode for continuous testing');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $src = $input->getArgument('src');
        $spec = $input->getArgument('spec');

        $watcher = new ResourceWatcher();

        $watcher->track('src', $src);
        $watcher->track('spec', $spec);

        $watcher->start();

    }

}