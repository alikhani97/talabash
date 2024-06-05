<?php
/**
 * Copyright ©  All rights reserved.
 * Developer: Mehdi Alikhani (alikhani.mehdi@hotmail.com)
 */
declare(strict_types=1);

namespace App;

use PDO;
use PDOException;

class Database
{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;
    public $pdo;

    public function __construct()
    {
        $this->host = 'mariadb';
        $this->db = 'talabash';
        $this->user = 'talabash';
        $this->pass = 'talabash';
        $this->charset = 'utf8';

        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }
}