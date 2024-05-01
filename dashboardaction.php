<?php

//include connection file with var $mysqli for mysql server connection 
include("php/conn.php");
// Check if the form is submitted


if (isset($_POST['submit'])) {
    // Get data from HTML post 
    $PName = $_POST["ProductName"];
    $PQuant = $_POST["quantity"];
    $PPrice = $_POST["price"];
    $PDescription = $_POST["description"];
    $table = $_POST["Add_quantity"];

    // Check for empty fields
    if (empty($PName) || empty($PQuant) || empty($PPrice) || empty($PDescription)) {
        if (empty($PName)) {
            echo ("<font color='red'>اسم الصنف فارغ.</font><br/>");
        }

        if (empty($PQuant)) {
            echo ("<font color='red'>الكمية فارغة.</font><br/>");
        }

        if (empty($PPrice)) {
            echo ("<font color='red'>السعر فارغ.</font><br/>");
        }

        if (empty($PDescription)) {
            echo ("<font color='red'>وصف الصنف فارغ.</font><br/>");
        }
    } else {



        $sql = "INSERT INTO $table (name, description, price, quantity) 
        VALUES (' $PName ', '$PDescription', $PPrice,$PQuant)";
        echo ($sql);


        if ($mysqli->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $mysqli->close();
    }
}
