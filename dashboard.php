<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible'
        content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport'
        content='width=device-width, initial-scale=1'>
    <link rel='stylesheet'
        type='text/css'
        media='screen'
        href='Css/style.css'>
    <script src='main.js'></script>
</head>

<body>

    <header>
        <a href="Index.html">الكاشير </a>
        <a href="dashboard.html"
            class="activ">المشتريات اضافه وحذف وتعديل </a>
        <a href="#">المبيعات </a>
        <a href="#">التقرير اليومي</a>
    </header>
    <!-- addAction.php -->
    <form action="dashboard.php"
        method="post">
        <fieldset>
            <legend>اضافة صنف جديد</legend>
            <label for="name">اسم الصنف:</label>
            <!--prodect name-->
            <input type="text"
                id="Product_Name"
                name="ProductName"
                required><br><br>
            <fieldset class="fieldset_edit">

                <!-- Radio Buttons-->
                <legend>الكميه</legend>
                <label>
                    <input id="piece_radio"
                        type="radio"
                        name="Add_quantity"
                        value="FoodItems"
                        checked
                        onclick="diableJS()">
                    بالجرام
                </label>
                <label>
                    <input id="grams_radio"
                        type="radio"
                        name="Add_quantity"
                        value="Drinks"
                        onclick="diableJS()">
                    بالقطعه
                </label>
                <!-- Radio Buttons-->

                <br><br>
                <label for="num_piece"> قطعه : </label>
                <input type="number"
                    id="num_piece"
                    name="quantity"
                    value="0"
                    min="1"
                    max="1000"
                    required>
                <br><br>
                <!--quantity-->
                <label for="num_grams"> عددالجرامات : </label>
                <input type="number"
                    id="num_grams"
                    name="quantity"
                    value=""
                    min="1"
                    max="5000"
                    required><br>
                <br>

                <br><br>
                <!--price-->
                <label for="price"> السعر : </label>
                <input type="number"
                    id="price"
                    name="price"
                    value=""
                    min="1"
                    max="5000"
                    required><br>
                <br>
                <!--description-->



                <!--description-->
                <input type="text"
                    id="description"
                    name="description"
                    placeholder="الوصف"
                    required>

                <br>
                <input type="submit"
                    name="submit"
                    value="اضافة صنف جديد ">
                <br><br>
            </fieldset>
        </fieldset>
    </form>
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
    ?>
    <script src="JS/dashboard.js"></script>
</body>

</html>