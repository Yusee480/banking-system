<?php
require_once 'db.php';

if (isset($_GET['sender_account']) && isset($_GET['receiver_account']) && isset($_GET['amount'])) {
    $sender_account = $_GET['sender_account'];
    $receiver_account = $_GET['receiver_account'];
    $amount = $_GET['amount'];

    $pdo->beginTransaction();

    $stmt1 = $pdo->prepare("UPDATE users SET balance = balance - :amount WHERE account_number = :sender_account AND balance >= :amount");
    $stmt1->bindParam(':amount', $amount);
    $stmt1->bindParam(':sender_account', $sender_account);
    $stmt1->execute();

    $stmt2 = $pdo->prepare("UPDATE users SET balance = balance + :amount WHERE account_number = :receiver_account");
    $stmt2->bindParam(':amount', $amount);
    $stmt2->bindParam(':receiver_account', $receiver_account);
    $stmt2->execute();

    if ($stmt1->rowCount() > 0 && $stmt2->rowCount() > 0) {
        $pdo->commit();
        echo "Transferred $amount from account $sender_account to account $receiver_account";
    } else {
        $pdo->rollBack();
        echo "Transfer failed. Insufficient balance or account not found";
    }
}
?>
