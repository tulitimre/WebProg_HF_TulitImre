<?php
require_once "db.php";

$sql = "SELECT * FROM products";

if (isset($conn)) {
    $result = $conn->query($sql);
    echo "<a href='insert.php'>ADD → New product!</a>";
    if ($result->num_rows > 0) {
        echo '<table border  = "1">';

        while ($row = $result->fetch_assoc()) {
            echo " <tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            $src = "upload/" . $row['image'];
            echo "<td>";
            echo "<img src='$src ' height='50px'>";
            echo "</td>";
            echo "<td><a href=\"update.php?id=" . $row['id'] . "\">Update</a></td>";
            echo "<td><a href=\"delete.php?id=" . $row['id'] . "&image=" . $src . "\">Delete</a></td>";
            echo " </tr>";
        }
        echo "</table>";
    } else {
        echo "<br>The table is empty!";
    }
}




