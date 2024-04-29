<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Css/style.css'>
    <script src='main.js'></script>
</head>

<body>

    <header>
        <a href="Index.html">الكاشير </a>
        <a href="dashboard.html" class="activ">المشتريات اضافه وحذف وتعديل </a>
        <a href="#">المبيعات </a>
        <a href="#">التقرير اليومي</a>
    </header>
    <!-- addAction.php -->
    <form action="dashboard.php" method="post">
        <fieldset>
            <legend>اضافة صنف جديد</legend>
            <label for="employe">اسم الصنف:</label>
            <input type="text" id="ProductName" name="ProductName" required><br><br>
            <fieldset class="fieldset_edit">
                <legend>الكميه</legend>
                <label>
                    <input id="piece_radio" type="radio" name="Add_quantity" value="piece" checked onclick="diableJS()">
                    بالجرام
                </label>
                <label>
                    <input id="grams_radio" type="radio" name="Add_quantity" value="grams" onclick="diableJS()">
                    بالقطعه
                </label>
                <br><br>
                <label for="num_piece"> قطعه : </label>
                <input type="number" id="num_piece" name="numberof_piece" value="0" min="1" max="1000">
                <br><br>
                <label for="num_grams"> عددالجرامات : </label>
                <input type="number" id="num_grams" name="numberof_grams" value="" min="1" max="5000"><br>
                <label for="num_quantity"> الكميه : </label>
                <br>
                <input type="number" id="num_quantity" name="numberof_quantity" value="1" min="1" max="1000"><br><br>
                <br>
                <textarea rows="4" cols="50" name="new_item" value="" placeholder="الوصف ">
                    </textarea>
                <br>
                <input type="button" value="اضافة صنف جديد ">
                <br><br>

            </fieldset>
        </fieldset>
    </form>
    <?php
    include("dbConnection.php");
    // Check if the form is submitted
    if (isset($_POST['button'])) {
        // Retrieve form data

        $employe = $_POST["employe"];
        $add_quantity = $_POST["Add_quantity"];
        $numberof_piece = $_POST["numberof_piece"];
        $numberof_grams = $_POST["numberof_grams"];
        $numberof_quantity = $_POST["numberof_quantity"];
        $new_item = $_POST["new_item"];
        // SQL query to insert data into the database
        $sql = "INSERT INTO !!! (ProductName, add_quantity, numberof_piece, numberof_grams, numberof_quantity, new_item)
            VALUES ('$employe', '$add_quantity', '$numberof_piece', '$numberof_grams', '$numberof_quantity', '$new_item')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>
    <script src="JS/dashboard.js"></script>
</body>

</html>