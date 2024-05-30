<?php
require("connector.php");

if (isset($_GET['id'])) {
    $item_id = $_GET['id'];
    $db = new DBConnection;
    $db->deleteItem($item_id);
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
