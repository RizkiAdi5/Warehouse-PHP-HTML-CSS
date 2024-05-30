<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <title>User</title>
</head>

<body>
    <h1>User</h1>

    <?php
    require("connector.php");
    ?>

    <div class="table-container">
        <table border="1px">
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Action</th>

            <?php
            $db = new DBConnection;
            $users = $db->getAllUsers();

            foreach ($users as $row) {
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["user_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";

                echo "<td>
                <a class='edit-btn' href='edit_user.php?id=" . $row["user_id"] . "'>Edit</a>
                <a class='delete-btn' href='delete_user.php?id=" . $row["user_id"] . "'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <h2>Add New User</h2>
    <form action="add_user_process.php" method="post">
        <label for="user_name">Username:</label><br>
        <input type="text" id="user_name" name="user_name"><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>

        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password"><br>

        <label for="role">Role :</label><br>
        <select id="role" name="role">
            <option value="-">------</option>
            <option value="admin">Admin</option>
        </select>
        <br><br>

        <input type="submit" value="Add User">
    </form>

</body>

</html>