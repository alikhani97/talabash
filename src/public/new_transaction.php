<?php
require '../vendor/autoload.php';

use App\Database;
use App\Model\Wallet;

$db = new Database();
$wallet = new Wallet($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = $_POST['amount'];
    $wallet->addTransaction(1, $amount);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Balance</title>
</head>
<body>
<form method="POST">
    <input type="number" name="amount" placeholder="Amount" required>
    <button type="submit">Add Balance</button>
</form>
<a href="view_transactions.php">View Transactions</a>
<a href="view_balance.php">View Balance</a>
</body>
</html>
