<?php
require '../vendor/autoload.php';

use App\Database;
use App\Model\Wallet;

$db = new Database();
$wallet = new Wallet($db);
$balance = $wallet->getBalance(1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        a {
            display: block;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Balance</h2>
    <p>Your balance is: <?php echo htmlspecialchars($balance); ?></p>
    <a href="new_transaction.php">Add Balance</a>
    <a href="view_transactions.php">View Transactions</a>
</div>
</body>
</html>