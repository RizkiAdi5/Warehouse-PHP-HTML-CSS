<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User </title>
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

            $user_id = $_POST["user_id"];
            $user_name = $_POST["user_name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $role = $_POST["role"];

            $db = new DBConnection;

            $success = $db->updateUser($user_id, $user_name, $email, $password, $role);

            if ($success) {
                echo  "<img src='aset/agree.png' alt='Success'>";
                echo "<p class='success-message'>User updated successfully!</p>";
                echo "<a class='back-btn' href='index.php'>Back</a>";

                exit;
            } else {
                header("Location: index.php?update_error=true");
                exit;
            }
        } else {
            header("Location: index.php");
            exit;
        }
        ?>
    </div>
</body>

</html>