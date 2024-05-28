<?php
require '../vendor/autoload.php';


use App\Database;
use App\Model\Wallet;


$db = new Database();
$wallet = new Wallet($db);
$transactions = $wallet->getTransactions(1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
</head>
<body>
<h2>Transactions</h2>
<ul>
    <?php foreach ($transactions as $transaction): ?>
        <li><?php echo htmlspecialchars($transaction['amount']); ?> on <?php echo htmlspecialchars($transaction['created_at']); ?></li>
    <?php endforeach; ?>
</ul>
<a href="new_transaction.php">Add Balance</a>
<a href="view_balance.php">View Balance</a>
</body>
</html>