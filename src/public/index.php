<?php
require '../vendor/autoload.php';

use App\Database;
use App\Migration;

$db = new Database();

$migration = new Migration($db);
$migration->migrate();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wallet</title>
</head>
<body>
<a href="new_transaction.php">Add Balance</a>
<a href="view_transactions.php">View Transactions</a>
<a href="view_balance.php">View Balance</a>
</body>
</html>
