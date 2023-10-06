<?php

namespace Application\github\Console;

use Application\github\Library\GitHub;
use Application\github\Repository\GitHubRepository;
use Application\github\Serialize\GitHubSerialize;
use Application\github\Service\GitHubService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteRepositoryCommand extends Command
{
    protected string $commandName = 'repository:delete';
    protected string $commandDescription = "Delete the Repository in Your Account github";

    protected string $commandArgumentName = "repository name";
    protected string $commandArgumentDescription = "Give a name of repository For delete?";

    // options like -> "repository:all Mohammad --upper"
    protected string $commandOptionName = "upper";
    protected string $commandOptionDescription = 'If set, it will greet in uppercase letters';

    protected function configure(): void
    {
        $this
            ->setName($this->commandName)
            ->setDescription($this->commandDescription)
            ->addArgument(
                $this->commandArgumentName,
                InputArgument::OPTIONAL,
                $this->commandArgumentDescription
            )
            ->addOption(
                $this->commandOptionName,
                null,
                InputOption::VALUE_NONE,
                $this->commandOptionDescription
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $repositoryName = $input->getArgument($this->commandArgumentName);
        if ($input->getOption($this->commandOptionName)) {
            $repositoryName = strtoupper($repositoryName);
        }

        $output->writeln('Start command DELETE Repository(' . $repositoryName . ')' . "\n");

        // call service
        $gitHubService = new GitHubService(
            new GitHubRepository(new GitHub()),
            new GitHubSerialize()
        );
        $output->writeln(json_encode($gitHubService->delete($repositoryName)));

        $output->writeln("\n" . 'Finish command DELETE Repository(' . $repositoryName . ')' . "\n");
    }
}
