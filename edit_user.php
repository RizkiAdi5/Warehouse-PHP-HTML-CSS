<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>User</title>

</head>

<body>
    <h1>User Update</h1>

    <?php
    require("connector.php");

    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];

        $db = new DBConnection;
        $user = $db->getUserById($user_id);

        if ($user) {
            $user_name = $user['user_name'];
            $email = $user['email'];
            $password = $user['password'];
            $role = $user['role'];
        } else {
            header("Location: homepage.php");
            exit;
        }
    } else {
        header("Location: homepage.php");
        exit;
    }
    ?>

    <form action="process_edit_user.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

        <label for="user_name">Username:</label><br>
        <input type="text" id="user_name" name="user_name" value="<?php echo $user_name; ?>"><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br>

        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password" value="<?php echo $password; ?>"><br>

        <label for="role">Role:</label><br>
        <select id="role" name="role">
            <option value="admin" <?php if ($role == 'admin') echo 'selected'; ?>>Admin</option>
            <option value="-" <?php if ($role == '-') echo '-'; ?>>-----</option>
        </select>
        <br><br>

        <input type="submit" value="Update User">
        <a href="index.php">Back</a>
    </form>

</body>

</html>