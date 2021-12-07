<?php
require_once "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $image = $_GET['image'];
    $sql = "DELETE FROM products WHERE id = '$id'";
    if (isset($conn)) {
        if ($conn->query($sql) === true) {
            if ($theImage = $conn->query($sql) === true) {
                unlink($image);
                header("Location: listing.php");
            }
        } else {
            echo $conn->error;
        }
    }
}