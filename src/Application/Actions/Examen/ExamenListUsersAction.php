<?php

namespace App\Application\Actions\Examen;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\UserService;

class ExamenListUsersAction
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $users = $this->userService->getAllUsers();
        
        $response->getBody()->write(json_encode($users));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
