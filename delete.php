<?php
    // Include the database connection file
    include("php/conn.php");

  
    // Get id parameter value from URL
    $id = $_GET['id'];
    $type = $_GET['type'];

    // Print id and type
    echo "ID: " . $id . "<br>";
    echo "Type: " . $type;

         $sql="DELETE FROM $type WHERE id = $id";
            echo $sql;
        
        $result = mysqli_query($mysqli,  $sql);
        echo $result;
     
    

    // Check if delete operation was successful
    if ($result) {
        // Redirect to the main display page (index.php in our case)
        header("Location:index.php");
        exit; // Ensure no further code execution after redirection
    } else {
        // Redirect with an error message if delete operation failed
       // header("Location:index.php?error=1");
      //  exit; // Ensure no further code execution after redirection
    }
    $mysqli->close();
?>