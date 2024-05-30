<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
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
            $category_name = $_POST["category_name"];

            $db = new DBConnection;
            $success = $db->addCategory($category_name);

            if ($success) {
                echo "<img src='aset/agree.png' alt='Success'>";
                echo "<p class='success-message'>Category added successfully!</p>";
                echo "<a href='index.php' class='back-btn'>Back</a>";
            } else {
                echo "<p class='error-message'>Failed to add category.</p>";
                echo "<a href='index.php' class='back-btn'>Back</a>";
            }
        }
        ?>
    </div>
</body>

</html>