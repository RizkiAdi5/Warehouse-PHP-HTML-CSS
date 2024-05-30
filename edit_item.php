<!-- edit_item.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <h1>Edit Item</h1>

    <?php 
    require("connector.php");
    
    // Cek apakah parameter ID diberikan di URL
    if(isset($_GET['id'])) {
        $item_id = $_GET['id'];
        
        // Ambil data item dari database berdasarkan ID
        $db = new DBConnection;
        $item = $db->getItemById($item_id);
        
        if($item) {
            // Jika item ditemukan, isi nilai-nilai form dengan data yang ada
            $item_name = $item['item_name'];
            $description = $item['description'];
            $price = $item['price'];
            $stock_quantity = $item['stock_quantity'];
            $category_id = $item['category_id'];
            $location_id = $item['location_id'];
        } else {
            // Jika item tidak ditemukan, redirect kembali ke halaman utama
            header("Location: index.php");
            exit;
        }
    } else {
        // Jika tidak ada parameter ID di URL, redirect kembali ke halaman utama
        header("Location: index.php");
        exit;
    }
    ?>

    <form action="edit_item_process.php" method="post">
        <!-- Sertakan ID item sebagai input tersembunyi -->
        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">

        <label for="item_name">Item Name:</label><br>
        <input type="text" id="item_name" name="item_name" value="<?php echo htmlspecialchars($item_name); ?>"><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($description); ?>"><br>
        
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>"><br>
        
        <label for="stock_quantity">Quantity:</label><br>
        <input type="text" id="stock_quantity" name="stock_quantity" value="<?php echo htmlspecialchars($stock_quantity); ?>"><br>
        
        <label for="category_id">Category ID:</label><br>
        <input type="text" id="category_id" name="category_id" value="<?php echo htmlspecialchars($category_id); ?>"><br>
        
        <label for="location_id">Location ID:</label><br>
        <input type="text" id="location_id" name="location_id" value="<?php echo htmlspecialchars($location_id); ?>"><br><br>
        
        <input type="submit" value="Save Changes">
        <a href="index.php">Cancel</a>
    </form>

</body>

</html>
