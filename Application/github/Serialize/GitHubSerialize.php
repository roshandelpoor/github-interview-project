<?php

namespace Application\github\Serialize;

class GitHubSerialize
{
    public function details(array $response): array
    {
        $listRepositories = [];
        $listRepositories [$response["id"]] = [
            "name"        => $response["name"],
            "html_url"    => $response["html_url"],
            "description" => $response["description"]
        ];

        return $listRepositories;
    }

    public function list(array $response): array
    {
        $listRepositories = [];

        foreach ($response as $repository) {
            $listRepositories [$repository->id] = [
                "name"        => $repository->name,
                "html_url"    => $repository->html_url,
                "description" => $repository->description,
            ];
        }

        $listRepositories['count'] = count($response);

        return $listRepositories;
    }
}
