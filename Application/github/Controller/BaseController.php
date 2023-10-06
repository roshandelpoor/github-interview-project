<?php

namespace Application\github\Controller;

use Application\Core\Config;
use Application\Core\Response;

class BaseController
{
    public function __construct(public readonly Response $response)
    {
    }

    public function index(): void
    {
        $response = new Response();
        $response->toJSON([
            'status'                       => 1,
            'Application'                  => 'is running ...',
            'time'                         => date('Y-m-d H:m:s'),
            'GITHUB_ACCOUNT_USERNAME'      => Config::get('GITHUB_ACCOUNT_USERNAME'),
            'GITHUB_ACCOUNT_CLASSIC_TOKEN' => Config::get('GITHUB_ACCOUNT_CLASSIC_TOKEN')
        ]);
    }
}
