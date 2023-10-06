<?php

namespace Application\github\Repository;

use Application\Core\Request;
use Application\github\Library\GitHub;
use Psr\Http\Message\ResponseInterface;

class GitHubRepository
{
    public function __construct(public readonly GitHub $gitHub)
    {
    }

    public function mine(null|String $username): ResponseInterface|string
    {
        return $this->gitHub->repositoryByUsername($username);
    }

    public function list(): ResponseInterface|string
    {
        return $this->gitHub->listRepository();
    }

    public function add($repositoryName): ResponseInterface|string
    {
        return $this->gitHub->addRepository($repositoryName);
    }

    public function delete($repositoryName): ResponseInterface|string
    {
        return $this->gitHub->deleteRepository($repositoryName);
    }
}
