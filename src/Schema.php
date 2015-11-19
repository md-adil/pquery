<?php namespace PQuery;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
* 
*/
class Schema extends Command
{
	
	protected function configure()
	{
		$this->setName('sayhi')
		->setDescription("Say hi to someone")
		->addArgument('name')
		->addOption('ver',
			null,
			InputOption::VALUE_REQUIRED);
	}
	protected function execute(InputInterface $input, OutputInterface $output) {
		$output->writeln('<info>'. $input->getArgument('name'). '</>');
		$output->writeln('<question>'. $input->getOption('ver'). '</>');
	}
}