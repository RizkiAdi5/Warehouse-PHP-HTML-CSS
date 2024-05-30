<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <h1>Edit Transaction</h1>

    <?php
    require("connector.php");

    if (isset($_GET['transaction_id'])) {
        $transaction_id = $_GET['transaction_id'];

        $db = new DBConnection;
        $transaction = $db->getTransactionById($transaction_id);

        if ($transaction) {
            $item_id = $transaction['item_id'];
            $supplier_id = $transaction['supplier_id'];
            $user_id = $transaction['user_id'];
            $quantity = $transaction['quantity'];
            $transaction_date = $transaction['transaction_date'];
        } else {
            header("Location: transactions.php");
            exit;
        }
    } else {
        header("Location: transactions.php");
        exit;
    }
    ?>

<form action="transaction_process.php" method="post">
        <input type="hidden" name="transaction_id" value="<?php echo $transaction_id; ?>">

        <label for="item_id">Item ID:</label><br>
        <input type="text" id="item_id" name="item_id" value="<?php echo $item_id; ?>"><br>

        <label for="supplier_id">Supplier ID:</label><br>
        <input type="text" id="supplier_id" name="supplier_id" value="<?php echo $supplier_id; ?>"><br>

        <label for="user_id">User ID:</label><br>
        <input type="text" id="user_id" name="user_id" value="<?php echo $user_id; ?>"><br>

        <label for="quantity">Quantity:</label><br>
        <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>"><br>

        <label for="transaction_date">Transaction Date:</label><br>
        <input type="date" id="transaction_date" name="transaction_date" value="<?php echo $transaction_date; ?>"><br><br>

        <input type="submit" value="Update Transaction">
        <a href="index.php">Back</a>
    </form>

</body>

</html>
