<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .message-container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            margin: 20px auto;
        }

        .message-container img {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }

        .success-message {
            color: #4CAF50;
            font-weight: bold;
        }

        .error-message {
            color: #f44336;
            font-weight: bold;
        }

        /* Styling tombol kembali */
        .back-btn {
            background-color: #333;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }
        
        .back-btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="message-container">
        <?php
        require("connector.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $item_id = $_POST['item_id']; // tambahkan item_id untuk mengidentifikasi item yang akan diedit
            $item_name = $_POST['item_name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $stock_quantity = $_POST['stock_quantity'];
            $category_id = $_POST['category_id'];
            $location_id = $_POST['location_id'];

            $db = new DBConnection;
            $result = $db->updateItem($item_id, $item_name, $description, $price, $stock_quantity, $category_id, $location_id); // perbarui fungsi updateItem untuk menerima item_id

            if ($result) {
                echo "<img src='aset/agree.png' alt='Success'>";
                echo "<p class='success-message'>Item data updated successfully !</p>";
                echo "<a href='index.php' class='back-btn'>Back</a>";
                exit;
            } else {
                echo "Error updating item data.";
                exit;
            }
        }
        ?>
    </div>
</body>

</html>
