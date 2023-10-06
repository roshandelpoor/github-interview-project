<?php

namespace Application\github\Service;

use Application\Core\Request;
use Application\github\Repository\GitHubRepository;
use Application\github\Serialize\GitHubSerialize;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class GitHubService
{
    public function __construct(
        public readonly GitHubRepository $gitHubRepository,
        public readonly GitHubSerialize  $gitHubSerialize
    ) {
        //
    }

    public function listWithFilter(Request $request): string|array
    {
        try {
            // take filter repository name
            $username = null;
            if (isset($request->params[0])) {
                $username = $request->params[0];
            }

            if ($username && $username != 'all') {
                $repositories = $this->gitHubRepository->mine($username);
            } else {
                $repositories = $this->gitHubRepository->list();
            }

            $repositories = json_decode($repositories);
            return $this->gitHubSerialize->list($repositories);
        } catch (GuzzleException|Exception $e) {
            return $e->getMessage();
        }
    }

    public function add($repositoryName = 'interview_create'): array|string
    {
        try {
            $repositories = $this->gitHubRepository->add($repositoryName);

            return $repositories == 201 ?
                "(success)NEW Repository ($repositoryName) was added" :
                "(fail)NEW Repository ($repositoryName) was added";
        } catch (GuzzleException|Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($repositoryName = 'interview_create'): array|string
    {
        try {
            $repositories = $this->gitHubRepository->delete($repositoryName);

            return $repositories == 204 ?
                "(success)DELETE Repository ($repositoryName) was deleted" :
                "(fail)DELETE Repository ($repositoryName) was deleted";
        } catch (GuzzleException|Exception $e) {
            return $e->getMessage();
        }
    }
}
