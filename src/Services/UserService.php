<?php

namespace App\Services;

class UserService
{
    private array $users = [];
    private string $storageFile = __DIR__ . '/DBusers.json';

    public function __construct()
    {
        $this->loadUsers();
    }

    private function loadUsers(): void
    {
        if (file_exists($this->storageFile)) {
            $json = file_get_contents($this->storageFile);
            $this->users = json_decode($json, true) ?: [];
        }
    }

    private function saveUsers(): void
    {
        file_put_contents($this->storageFile, json_encode($this->users, JSON_PRETTY_PRINT));
    }

    public function getAllUsers(): array
    {
        return $this->users;
    }

    public function addUser(array $user): array
    {
        $user['id'] = count($this->users) + 1;
        $this->users[] = $user;
        $this->saveUsers();
        return [
            'data'    => 1,
            'message' => 'Usuario agregado'
        ];
    }
}
