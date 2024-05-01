<?php
include("php/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all necessary data is received
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])) {
        // Sanitize the data
        $id = mysqli_real_escape_string($mysqli, $_POST['id']);
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $price = mysqli_real_escape_string($mysqli, $_POST['price']);
        $
        // Update the item in the database
        $query = "UPDATE YourTableName SET name='$name', price='$price' WHERE id=$id";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            echo "Item updated successfully.";
        } else {
            echo "Error updating item: " . mysqli_error($mysqli);
        }
    } else {
        echo "All fields are required.";
    }
}

$mysqli->close();
?>
