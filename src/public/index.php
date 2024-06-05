<?php
require '../vendor/autoload.php';

use App\Database;
use App\Migrate;

$db = new Database();

$migration = new Migrate($db);
$migration->migrate();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wallet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .link {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <a class="link" href="new_transaction.php">Add Balance</a>
    <a class="link" href="view_transactions.php">View Transactions</a>
    <a class="link" href="view_balance.php">View Balance</a>
</div>
</body>
</html>
