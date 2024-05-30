<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <h1>Edit Supplier</h1>

    <?php
    require("connector.php");

    if (isset($_GET['supplier_id'])) {
        $supplier_id = $_GET['supplier_id'];

        $db = new DBConnection;
        $supplier = $db->getSupplierById($supplier_id);

        if ($supplier) {
            $supplier_name = $supplier['supplier_name'];
            $supplier_contact = $supplier['supplier_contact'];
            $supplier_address = $supplier['supplier_address'];
        } else {
            header("Location: supplier.php");
            exit;
        }
    } else {
        header("Location: supplier.php");
        exit;
    }
    ?>

    <form action="edit_suppliers_process.php" method="post">
        <input type="hidden" name="supplier_id" value="<?php echo $supplier_id; ?>">

        <label for="supplier_name">Supplier Name:</label><br>
        <input type="text" id="supplier_name" name="supplier_name" value="<?php echo htmlspecialchars($supplier_name); ?>"><br>

        <label for="supplier_contact">Supplier Contact:</label><br>
        <input type="text" id="supplier_contact" name="supplier_contact" value="<?php echo htmlspecialchars($supplier_contact); ?>"><br>

        <label for="supplier_address">Supplier Address:</label><br>
        <input type="text" id="supplier_address" name="supplier_address" value="<?php echo htmlspecialchars($supplier_address); ?>"><br>

        <input type="submit" value="Save Changes">
        <a href="index.php">Cancel</a>
    </form>

</body>

</html>