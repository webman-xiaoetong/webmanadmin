<?php

namespace App\Console\Cmd;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCmd extends Command
{
    protected function configure()
    {
        $this->setName('test')->setDescription('Create new model');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo __METHOD__ . PHP_EOL;
        return Command::SUCCESS;
    }


}