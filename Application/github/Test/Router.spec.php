<?php namespace Application\Test;

use Application\Core\Router;
use function Eloquent\Phony\stub;

describe("App\\Library\\Router", function () {
    describe("->get", function () {

        it("Call First Route and execute the callback", function () {
            // Mock Request
            $_SERVER['REQUEST_METHOD'] = 'GET';
            $_SERVER['REQUEST_URI'] = '/';

            $stub = stub(function () {
                //
            });
            Router::get('/', $stub);

            $stub->called();
        });
    });
});

describe("App\\Library\\Router", function () {
    describe("->get", function () {

        it("Call Repositories Route and execute the callback", function () {
            // Mock Request
            $_SERVER['REQUEST_METHOD'] = 'GET';
            $_SERVER['REQUEST_URI'] = '/github/repositories';

            $stub = stub(function () {
                //
            });
            Router::get('/github/repositories', $stub);

            $result = $stub->called();
            assert(count($result) === 100, 'expected 100');
        });
    });
});

describe("App\\Library\\Router", function () {
    describe("->get", function () {

        it("Call Repositories By USERNAME and execute the callback", function () {
            // Mock Request
            $_SERVER['REQUEST_METHOD'] = 'GET';
            $_SERVER['REQUEST_URI'] = '/github/repositories/username=roshandelpoor';

            $stub = stub(function () {
                //
            });
            Router::get('/github/repositories/username=roshandelpoor', $stub);

            $result = $stub->called();
            assert(count($result) === 30, 'expected 30');
        });
    });
});
