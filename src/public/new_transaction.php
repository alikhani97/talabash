<?php
require '../vendor/autoload.php';

use App\Database;
use App\Model\Wallet;

$db = new Database();
$wallet = new Wallet($db);

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    if ($wallet->addTransaction(1, $amount)) {
        $message = 'Balance added successfully!'; // Set success message
    } else {
        $message = 'Failed to add balance.'; // Set failure message
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Balance</title>
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

        form {
            margin-bottom: 20px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .links {
            display: flex;
            justify-content: space-between;
        }

        .links a {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .links a:hover {
            background-color: #0056b3;
        }

        .message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px 20px;
            border-radius: 4px;
            margin-bottom: 20px;
            display: <?php echo $message ? 'block' : 'none'; ?>; /* Show message only if it's not empty */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="message"><?php echo $message; ?></div>
    <form method="POST">
        <input type="number" name="amount" placeholder="Amount" required>
        <button type="submit">Add Balance</button>
    </form>
    <div class="links">
        <a href="view_transactions.php">View Transactions</a>
        <a href="view_balance.php">View Balance</a>
    </div>
</div>
</body>
</html>
