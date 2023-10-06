<?php

namespace Application\Core;

class Response
{
    private int $status = 200;

    public function status(int $code): Response
    {
        $this->status = $code;
        return $this;
    }

    public function toJSON($data = []): void
    {
        http_response_code($this->status);
        header('Content-Type: application/json');

        echo json_encode($data);
    }
}
