<?php
include("php/conn.php");

// Check if ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    // Retrieve item details from the database based on the provided ID
    $query = "SELECT * FROM $type WHERE id = $id";
    $result = mysqli_query($mysqli, $query);
    
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Display form with current item details pre-filled for editing
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Check if all necessary data is received
            if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])) {
                // Sanitize the data
                $id = mysqli_real_escape_string($mysqli, $_POST['id']);
                $name = mysqli_real_escape_string($mysqli, $_POST['name']);
                $price = mysqli_real_escape_string($mysqli, $_POST['price']);

                // Update the item in the database
                $update_query = "UPDATE $type SET name='$name', price='$price' WHERE id=$id";
                $update_result = mysqli_query($mysqli, $update_query);

                if ($update_result) {
                    echo "Item updated successfully.";
                } else {
                    echo "Error updating item: " . mysqli_error($mysqli);
                }
            } else {
                echo "All fields are required.";
            }
        } else {
?>
<form method="post"
    action="">
    <input type="hidden"
        name="id"
        value="<?php echo $row['id']; ?>">
    <input type="text"
        name="name"
        value="<?php echo $row['name']; ?>">
    <input type="text"
        name="price"
        value="<?php echo $row['price']; ?>">
    <input type="submit"
        value="Update">
</form>
<?php
        }
    } else {
        echo "Item not found.";
    }
} else {
    echo "ID not provided.";
}
$mysqli->close();
?>