<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="homepage.css"  >
</head>

<body>
    <h1>Transaction</h1>

    <?php
    require("connector.php");
    ?>
    <div class="table-container">
        <table border="1px">
            <th>Transaction ID</th>
            <th>Item Name</th>
            <th>Supplier Name</th>
            <th>User Name</th>
            <th>Quantity</th>
            <th>Transaction Date</th>
            <th>Action</th>

            <?php
            $db = new DBConnection;
            $transactions = $db->getAllTransactionsWithDetails();

            foreach ($transactions as $row) {
                echo "<tr>";
                echo "<td>" . $row["transaction_id"] . "</td>";
                echo "<td>" . $row["item_name"] . "</td>";
                echo "<td>" . $row["supplier_name"] . "</td>";
                echo "<td>" . $row["user_name"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "<td>" . $row["transaction_date"] . "</td>";

                echo "<td>
                    <a class='edit-btn' href='update_transaction.php?id=" . $row["transaction_id"] . "'>Edit</a>
                    <a class='delete-btn' href='delete_transaksi.php?id=" . $row["transaction_id"] . "'>Delete</a>
                </td>";

                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <h2>Add New Transaction</h2>
    <form action="add_transactions.php" method="post">
        <label for="item_id">Item ID:</label><br>
        <input type="text" id="item_id" name="item_id" value="<?php echo isset($transaction['item_id']) ? $transaction['item_id'] : ''; ?>"><br>

        <label for="supplier_id">Supplier ID:</label><br>
        <input type="text" id="supplier_id" name="supplier_id" value="<?php echo isset($transaction['supplier_id']) ? $transaction['supplier_id'] : ''; ?>"><br>

        <label for="user_id">User ID:</label><br>
        <input type="text" id="user_id" name="user_id" value="<?php echo isset($transaction['user_id']) ? $transaction['user_id'] : ''; ?>"><br>

        <label for="quantity">Quantity of Item:</label><br>
        <input type="text" id="quantity" name="quantity" value="<?php echo isset($transaction['quantity']) ? $transaction['quantity'] : ''; ?>"><br>

        <label for="transaction_date">Transaction Date:</label><br>
        <input type="date" id="transaction_date" name="transaction_date" value="<?php echo isset($transaction['transaction_date']) ? $transaction['transaction_date'] : ''; ?>"><br><br>


        <input type="submit" value="Add Transaction">
    </form>
</body>

</html>