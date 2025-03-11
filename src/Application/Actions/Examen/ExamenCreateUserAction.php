<?php

namespace App\Application\Actions\Examen;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Services\UserService;

class ExamenCreateUserAction
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        if (!isset($data['name'], $data['email'], $data['edad'])) {
            $errorResponse = [
                'error' => 'Todos los campos son requeridos'
            ];
            $response->getBody()->write(json_encode($errorResponse));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(400);
        }

        $newUser = $this->userService->addUser($data);

        $response->getBody()->write(json_encode($newUser));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
