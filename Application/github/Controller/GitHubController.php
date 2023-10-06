<?php

namespace Application\github\Controller;

use Application\Core\Request;
use Application\Core\Response;
use Application\github\Service\GitHubService;

class GitHubController
{
    public function __construct(public readonly GitHubService $gitHubService)
    {
    }

    public function list(Request $request, Response $response): void
    {
        $response->toJSON($this->gitHubService->listWithFilter($request));
    }
}
