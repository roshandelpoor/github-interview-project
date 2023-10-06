<?php

use Application\Core\Request;
use Application\Core\Response;
use Application\Core\Router;
use Application\github\Controller\BaseController;
use Application\github\Controller\GitHubController;
use Application\github\Library\GitHub;
use Application\github\Repository\GitHubRepository;
use Application\github\Serialize\GitHubSerialize;
use Application\github\Service\GitHubService;
use Dotenv\Dotenv;

// load all environments
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../../');
$dotenv->load();

Router::get('/', function () {
    (new BaseController(new Response()))->index();
});

Router::get('/github/repositories', function (Request $request, Response $response) {
    $githubService = new GitHubController(
        new GitHubService(
            new GitHubRepository(new GitHub()),
            new GitHubSerialize()
        )
    );

    $githubService->list($request, $response);
});

Router::get('/github/repositories/username=([^&]*)', function (Request $request, Response $response) {
    $githubService = new GitHubController(
        new GitHubService(
            new GitHubRepository(new GitHub()),
            new GitHubSerialize()
        )
    );

    $githubService->list($request, $response);
});
