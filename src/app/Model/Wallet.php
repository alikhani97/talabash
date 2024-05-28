<?php
/**
 * Copyright ©  All rights reserved.
 * Developer: Mehdi Alikhani (alikhani.mehdi@hotmail.com)
 */
declare(strict_types=1);

namespace App\Model;

class Wallet
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addTransaction($userId, $amount)
    {
        $stmt = $this->db->pdo->prepare('INSERT INTO transactions (user_id, amount) VALUES (?, ?)');
        return $stmt->execute([$userId, $amount]);
    }

    public function getTransactions($userId)
    {
        $stmt = $this->db->pdo->prepare('SELECT * FROM transactions WHERE user_id = ? ORDER BY created_at DESC');
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function getBalance($userId)
    {
        $stmt = $this->db->pdo->prepare('SELECT SUM(amount) as balance FROM transactions WHERE user_id = ?');
        $stmt->execute([$userId]);
        return $stmt->fetch()['balance'];
    }
}