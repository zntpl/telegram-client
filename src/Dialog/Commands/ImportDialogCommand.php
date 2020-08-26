<?php

namespace App\Dialog\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportDialogCommand extends Command
{

    protected static $defaultName = 'dialog:import';

    public function __construct(?string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure()
    {
        //$this->addArgument('dir', InputArgument::REQUIRED, 'Who do you want to greet?');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<fg=white># Import dialog</>');
        /** @var \App\Dialog\Domain\Interfaces\Services\TagServiceInterface $tagService */
        //$tagService = $this->container->get(\App\Dialog\Domain\Services\TagService::class);
        //$tagService->import($this->container);
        return 0;
    }
}
