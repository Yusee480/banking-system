<?php
require_once 'db.php';

if (isset($_GET['account_number']) && isset($_GET['amount'])) {
    $account_number = $_GET['account_number'];
    $amount = $_GET['amount'];

    $stmt = $pdo->prepare("UPDATE users SET balance = balance - :amount WHERE account_number = :account_number AND balance >= :amount");
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':account_number', $account_number);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Withdrawn $amount from account $account_number";
    } else {
        echo "Insufficient balance or account not found";
    }
}
?>
