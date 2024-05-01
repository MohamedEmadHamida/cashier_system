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
    <form action="dashboardaction.php"
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
                <legend>النوع</legend>
                <label>
                    <input id="piece_radio"
                        type="radio"
                        name="Add_quantity"
                        value="Drinks"
                        checked
                        onclick="diableJS()">
                    مشروبات
                </label>
                <label>
                    <input id="grams_radio"
                        type="radio"
                        name="Add_quantity"
                        value="FoodItems"
                        onclick="diableJS()">
                    ماكولات
                </label>
                <!-- Radio Buttons-->

                <br><br>
                <label for="num_piece"> عدد الماكولات : </label>
                <input type="number"
                    id="num_piece"
                    name="quantity"
                    value="0"
                    min="1"
                    max="1000"
                    required>
                <br><br>
                <!--quantity-->
                <label for="num_grams"> عددالمشروبات : </label>
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

    <script src="JS/dashboard.js"></script>
</body>

</html>