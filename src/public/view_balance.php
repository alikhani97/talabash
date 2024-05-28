<?php
require '../vendor/autoload.php';

use App\Database;
use App\Model\Wallet;

$db = new Database();
$wallet = new Wallet($db);
$balance = $wallet->getBalance(1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Balance</title>
</head>
<body>
<h2>Balance</h2>
<p>Your balance is: <?php echo htmlspecialchars($balance); ?></p>
<a href="new_transaction.php">Add Balance</a>
<a href="view_transactions.php">View Transactions</a>
</body>
</html>
