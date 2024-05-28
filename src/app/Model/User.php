<?php
/**
 * Copyright ©  All rights reserved.
 * Developer: Mehdi Alikhani (alikhani.mehdi@hotmail.com)
 */
declare(strict_types=1);

namespace App\Model;

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createUser($username, $password)
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
        return $stmt->execute([$username, $hash]);
    }

    public function getUser($username)
    {
        $stmt = $this->db->pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
}