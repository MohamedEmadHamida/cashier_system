<!DOCTYPE html>
<html lang="en"
    dir="rtl">





<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>cashier system</title>
    <link rel="stylesheet"
        href="Css/style.css">
</head>

<body>
    <header>
        <a href="Index.html"
            class="activ">الكاشير </a>
        <a href="dashboard.php">المشتريات اضافه وحذف وتعديل </a>
        <a href="#">المبيعات </a>
        <a href="#">التقرير اليومي</a>
    </header>

    <section class="form_1">


        <form action
            method="get">
            <div>
                <fieldset>
                    <h2>Search Function</h2>
                    <form method="GET">
                        <label for="search">Search:</label>
                        <input type="text"
                            id="search"
                            name="search">
                        <button type="submit">Search</button>
                        <legend>قائمة الماكولات والمشروبات</legend>

                        <br>


                        <input type="submit"
                            value="المأكولات"
                            name="food_items">
                        <input type="submit"
                            value="المشروبات"
                            name="drinks">


                        <br>
                        <div name="data"
                            id="orders"
                            style="height: 500px; width:auto; background-color: white; color:black; padding: 5px">
                            <?php
    // Include the database connection file
    include("php/conn.php");

    // Check if the button for المأكولات or المشروبات is clicked
    if(isset($_GET['food_items'])) {
        // Fetch data from FoodItems table
        $result = mysqli_query($mysqli, "SELECT * FROM FoodItems");
    } elseif(isset($_GET['drinks'])) {
        // Fetch data from Drinks table
        $result = mysqli_query($mysqli, "SELECT * FROM Drinks");
    }elseif(isset($_GET['search'])){
        $search = $_GET['search'];
        $result = mysqli_query($mysqli,"SELECT * FROM FoodItems WHERE name LIKE '%$search%' UNION SELECT * FROM Drinks WHERE name LIKE '%$search%'");
       

    }


    // Check if data is fetched successfully
    if($result) {
        // Loop through the fetched data and display it
        while ($res = mysqli_fetch_assoc($result)) {
            echo '<div class="foodOrder" data-item-id="'.$res['id'].'" style="cursor: pointer; display: flex; justify-content: space-between ;">
                    <p>'.$res['name'].'</p> <p>'.$res['price'].'</p>
                  </div>';
        }
    } else {
        // Display an error message if data fetching fails
        echo "Failed to fetch data.";
    }
?>

                        </div>
                </fieldset>
                <fieldset class="quantity">
                    <legend>الكميه</legend>
                    <input type="button"
                        value="9">
                    <input type="button"
                        value="8">
                    <input type="button"
                        value="7">
                    <br>

                    <input type="button"
                        value="6">
                    <input type="button"
                        value="5">
                    <input type="button"
                        value="4">
                    <br>

                    <input type="button"
                        value="3">
                    <input type="button"
                        value="2">
                    <input type="button"
                        value="1">
                    <br>
                    <input type="button"
                        value="مسح">
                    <input type="button"
                        value="0">
                    <br>
                    <input type="button"
                        value="- -">
                </fieldset>
            </div>
            <div class="acount-order">
                <fieldset>
                    <legend>الطلبات / الحساب</legend>
                    <div name="data"
                        id="bill"
                        style="height: auto; width:auto; background-color: white; color:black; padding: 5px">




                    </div>
                    <h1>اجمالي الحساب:</h1>
                    <p id="totalPrice">0</p>
                    <input type="button"
                        value="حذف طلب ">
                    <input type="button"
                        value=" الغاء الطلب"
                        id="cancelOrder">ٍ
                    <input type="button"
                        value="طلب">ٍ
                </fieldset>
            </div>
        </form>





    </section>

</body>
<!--<script src="JS/main.js"></script>

</html>