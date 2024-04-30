<?php
// Include connection file with var $mysqli for MySQL server connection 
include("php/conn.php");

// Check if the form is submitted

// Get data from HTML post 
// $ProductName = $_POST["ProductName"];
// $add_quantity = $_POST["Add_quantity"];
// $numberof_piece = $_POST["numberof_piece"];
// $numberof_grams = $_POST["numberof_grams"];
// $numberof_quantity = $_POST["numberof_quantity"];
// $new_item = $_POST["new_item"];
// End of data 

// If condition for which database to use

$table = "Drinks";

// SQL query to insert data into the database
$sql = "INSERT INTO $table (name, description, price, quantity) 
        VALUES ('Product Name', 'Product Description', 10.99, 100)";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close connection
$mysqli->close();

?>