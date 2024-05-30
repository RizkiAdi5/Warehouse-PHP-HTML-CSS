<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="homepage.css">
</head>

<body>
    <h1>Supplier</h1>
    <?php
    require("connector.php");
    $db = new DBConnection;
    ?>
    <div class="table-container">
        <table border="1px">
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Supplier Contact</th>
            <th>Supplier Address</th>
            <th>Action</th>
            <?php
            $suppliers = $db->getAllSuppliers();

            foreach ($suppliers as $supplier) {
                echo "<tr>";
                echo "<td>" . $supplier['supplier_id'] . "</td>";
                echo "<td>" . $supplier['supplier_name'] . "</td>";
                echo "<td>" . $supplier['supplier_contact'] . "</td>";
                echo "<td>" . $supplier['supplier_address'] . "</td>";
                echo "<td>
                      <a class='edit-btn' href='edit_supplier.php?supplier_id=" . $supplier['supplier_id'] . "'>Edit</a>
                      <a class='delete-btn' href='delete_supplier.php?supplier_id=" . $supplier['supplier_id'] . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <h2>Add New Supplier</h2>
    <form action="add_supplier.php" method="post">
        <label for="supplier_name">Supplier Name:</label><br>
        <input type="text" id="supplier_name" name="supplier_name"><br>

        <label for="supplier_contact">Supplier Contact:</label><br>
        <input type="text" id="supplier_contact" name="supplier_contact"><br>

        <label for="supplier_address">Supplier Address:</label><br>
        <input type="text" id="supplier_address" name="supplier_address"><br>

        <input type="submit" value="Add Supplier">
    </form>

</body>

</html>