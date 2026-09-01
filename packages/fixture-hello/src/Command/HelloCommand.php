<?php

declare(strict_types=1);

namespace Minspec\FixtureHello\Command;

use Minspec\FixtureHello\HelloService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'fixture:hello', description: 'Prove the fixture bundle is wired: print the recipe-supplied greeting.')]
final class HelloCommand extends Command
{
    public function __construct(private readonly HelloService $service)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('fixture-hello: '.$this->service->greeting());

        return Command::SUCCESS;
    }
}
