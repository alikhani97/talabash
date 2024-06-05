<?php
/**
 * Copyright ©  All rights reserved.
 * Developer: Mehdi Alikhani (alikhani.mehdi@hotmail.com)
 */
declare(strict_types=1);

namespace App;

class Migrate
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db->pdo;
    }

    public function migrate()
    {
        $this->createUser();
    }

    private function createUser()
    {
        $defaultUsername = 'admin';
        $defaultPassword = password_hash('admin', PASSWORD_BCRYPT);

        $userExists = $this->db->prepare("SELECT id FROM users WHERE username = :username");
        $userExists->execute(['username' => $defaultUsername]);
        $user = $userExists->fetch();

        if (!$user) {
            $query = $this->db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $query->execute(['username' => $defaultUsername, 'password' => $defaultPassword]);
        }
    }
}
