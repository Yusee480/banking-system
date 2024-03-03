<?php
require_once 'db.php';

if (isset($_GET['account_number']) && isset($_GET['amount'])) {
    $account_number = $_GET['account_number'];
    $amount = $_GET['amount'];

    $stmt = $pdo->prepare("UPDATE users SET balance = balance + :amount WHERE account_number = :account_number");
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':account_number', $account_number);
    $stmt->execute();

    echo "Deposited $amount into account $account_number";
}
?>
