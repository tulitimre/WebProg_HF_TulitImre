<?php
require_once "db.php";

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $id = $_POST['id'];
    $image_temp = $_FILES['image']['tmp_name'];

    if ($image_temp != "") {
        $filename = $_FILES['image']['name'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' . $filename)) {
            $sql = "UPDATE products SET title = '$title', price = '$price', category = '$category', image = '$filename' WHERE id=" . $id;
            if (isset($conn)) {
                endConn($conn, $sql);
            }
        } else {
            echo 'Error in uploading file - ' . $_FILES['image']['name'] . '<br/>';
        }


    } else {

        $sql = "UPDATE products SET title = '$title', price = '$price', category = '$category' WHERE id=" . $id;
        if (isset($conn)) {
            endConn($conn, $sql);
        }

    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=" . $id;
    if (isset($conn)) {
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $conn->close();
    }
}


function endConn($conn, $sql)
{
    if ($conn->query($sql)) {
        header("Location: listing.php");
        $conn->close();
    } else {
        echo 'Error: ' . $conn->error();
    }
}

?>

<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Title:<input type="Text" name="title" value="<?php echo $row['title']; ?>"><br>
    Price:<input type="Number" name="price" min="1" value="<?php echo $row['price']; ?>"><br>
    Category:<input type="Text" name="category" value="<?php echo $row['category']; ?>"><br>
    Image:<input type="file" accept="image/png, image/jpeg" name="image"/>
    <span name="old" value="<?php echo $row['image']; ?>"><?php echo $row['image']; ?></span><br>

    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

    <input type="Submit" name="submit" value="UPDATE">
</form>
