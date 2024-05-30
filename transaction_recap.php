<?php
require("connector.php");

$db = new DBConnection();

try {
    $result = $db->getAllTransactions();

    if ($result) {
        echo "<table border='1'>";
        echo "<tr>
        <th>Username</th>
        <th>Transaction Amount</th>
        </tr>";

        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No transactions found.";
    }
} catch (PDOException $e) {
    echo "Error executing query: " . $e->getMessage();
}
?>