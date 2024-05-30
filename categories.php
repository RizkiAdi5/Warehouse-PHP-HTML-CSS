<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <title>Category</title>
</head>

<body>
    <h1>Category</h1>

    <?php
    require("connector.php");
    ?>

    <div class="table-container">
        <table border="1px">
            <th>Category ID</th>
            <th>Category Name</th>




            <?php
            $db = new DBConnection;
            $categories = $db->getAllCategories();

            foreach ($categories as $row) {
                echo "<tr>";
                echo "<td>" . $row["category_id"] . "</td>";
                echo "<td>" . $row["category_name"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <h2>Add New Category</h2>
    <form action="add_kategori.php" method="post">
        <label for="category_name">Category name : </label>
        <input type="text" name="category_name" id="category_name"><br>

        <input type="submit" value="Add Category">
    </form>
</body>

</html>