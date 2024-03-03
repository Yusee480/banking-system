function deposit() {
    var amount = document.getElementById("depositAmount").value;
    if (amount > 0) {
        window.location.href = "deposit.php?amount=" + amount;
    }
}

function withdraw() {
    var amount = document.getElementById("withdrawAmount").value;
    if (amount > 0) {
        window.location.href = "withdraw.php?amount=" + amount;
    }
}

function transfer() {
    var amount = document.getElementById("transferAmount").value;
    var receiverName = document.getElementById("receiverName").value;
    var receiverAccount = document.getElementById("receiverAccount").value;
    if (amount > 0 && receiverName != "" && receiverAccount != "") {
        window.location.href = "transfer.php?amount=" + amount + "&receiverName=" + receiverName + "&receiverAccount=" + receiverAccount;
    }
}
