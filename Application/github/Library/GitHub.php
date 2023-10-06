<?php

namespace Application\github\Library;

use Application\Core\Config;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

class GitHub
{
    private static function commonHeaders(): array
    {
        return [
            'Accept'        => 'application/vnd.github+json',
            'Authorization' => 'Bearer ' . Config::get('GITHUB_ACCOUNT_CLASSIC_TOKEN')
        ];
    }

    public function repositoryDetails($repositoryName): ResponseInterface|string
    {
        try {
            $client = new Client();
            $request = new Request(
                'GET',
                'https://api.github.com/repos/' . Config::get('GITHUB_ACCOUNT_USERNAME') . '/' . $repositoryName,
                self::commonHeaders()
            );

            $response = $client->sendAsync($request)->wait();
            return $response->getBody();
        } catch (GuzzleException $e) {
            var_export($e->getMessage());
            return $e->getMessage();
        }
    }

    public function repositoryByUsername($username): ResponseInterface|string
    {
        try {
            $client = new Client();
            $request = new Request('GET', 'https://api.github.com/users/'. $username .'/repos', self::commonHeaders());

            $response = $client->sendAsync($request)->wait();
            return $response->getBody();
        } catch (GuzzleException $e) {
            var_export($e->getMessage());
            return $e->getMessage();
        }
    }

    public function listRepository(): ResponseInterface|string
    {
        try {
            $client = new Client();
            $request = new Request('GET', 'https://api.github.com/repositories', self::commonHeaders());

            $response = $client->sendAsync($request)->wait();
            return $response->getBody();
        } catch (GuzzleException $e) {
            var_export($e->getMessage());
            return $e->getMessage();
        }
    }

    public function addRepository($repositoryName): ResponseInterface|string
    {
        try {
            $client = new Client();
            $body = json_encode([
                "name" => $repositoryName
            ]);
            $request = new Request('POST', 'https://api.github.com/user/repos', self::commonHeaders(), $body);

            $response = $client->sendAsync($request)->wait();
            return $response->getStatusCode();
        } catch (GuzzleException $e) {
            var_export($e->getMessage());
            return $e->getMessage();
        }
    }

    public function deleteRepository($repositoryName): ResponseInterface|string
    {
        try {
            $client = new Client();
            $request = new Request(
                'DELETE',
                'https://api.github.com/repos/' . Config::get('GITHUB_ACCOUNT_USERNAME') . '/' . $repositoryName,
                self::commonHeaders()
            );

            $response = $client->sendAsync($request)->wait();
            return $response->getStatusCode();
        } catch (GuzzleException $e) {
            var_export($e->getMessage());
            return $e->getMessage();
        }
    }
}
