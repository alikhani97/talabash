<?php
/**
 * Copyright ©  All rights reserved.
 * Developer: Mehdi Alikhani (alikhani.mehdi@hotmail.com)
 */
declare(strict_types=1);

namespace App;

class Migration
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db->pdo;
    }

    public function migrate()
    {
        $this->createUsersTable();
        $this->createWalletTable();
        $this->createTransactionsTable();
    }

    private function createWalletTable()
    {
        $this->db->exec("CREATE TABLE IF NOT EXISTS wallets (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            balance DECIMAL(10, 2) DEFAULT 0.00,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        ) ENGINE=INNODB;");
    }
    private function createUsersTable()
    {
        $query = "
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;
        ";
        $this->db->exec($query);
    }

    private function createTransactionsTable()
    {
        $query = "
            CREATE TABLE IF NOT EXISTS transactions (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                amount DECIMAL(10, 2) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id)
            ) ENGINE=INNODB;
        ";
        $this->db->exec($query);
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
