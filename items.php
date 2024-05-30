<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="homepage.css">
</head>

<body>
    <h1>Item</h1>

    <?php require("connector.php"); 
    $db = new DBConnection;
    ?>

    <div class="table-container">
        <table border="1px solid black">
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category ID</th>
            <!-- Warehouse location -->
            <th>Location ID</th>
            <th>Action</th>
            <?php
            $db = new DBConnection;
            $items = $db->getAllItems();

            foreach ($items as $row) {
                echo "<tr>";
                echo "<td>" . $row["item_id"] . "</td>";
                echo "<td>" . $row["item_name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["stock_quantity"] . "</td>";
                echo "<td>" . $row["category_id"] . "</td>";
                echo "<td>" . $row["location_id"] . "</td>";
                echo "<td>
                <a class='edit-btn' href='edit_item.php?id=" . $row["item_id"] . "'>Edit</a>
                <a class='delete-btn' href='delete_item.php?id=" . $row["item_id"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </table>

    </div>
    <h2>Add New Item</h2>
    <form action="add_item.php" method="post">
        <label for="item_name">Item Name:</label><br>
        <input type="text" id="item_name" name="item_name"><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description"><br>
        
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br>
        
        <label for="stock_quantity">Quantity:</label><br>
        <input type="text" id="stock_quantity" name="stock_quantity"><br>
        
        <label for="category_id">Category ID:</label><br>
        <input type="text" id="category_id" name="category_id"><br>
        
        <label for="location_id">Location ID:</label><br>
        <input type="text" id="location_id" name="location_id"><br><br>
        
        <input type="submit" value="Add Item">
    </form>

</body>

</html>