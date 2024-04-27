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
    <form action=""
        method="get">
        <fieldset>
            <legend>اضافة صنف جديد</legend>
            <label for="employe">اسم الصنف:</label>
            <input type="text"
                id="employe"
                name="employe"
                required><br><br>
            <fieldset class="fieldset_edit">
                <legend>الكميه</legend>
                <label>
                    <input id="piece_radio"
                        type="radio"
                        name="Add_quantity"
                        value="piece"
                        checked
                        onclick="diableJS()">
                    بالجرام
                </label>
                <label>
                    <input id="grams_radio"
                        type="radio"
                        name="Add_quantity"
                        value="grams"
                        onclick="diableJS()">
                    بالقطعه
                </label>
                <br><br>
                <label for="num_piece"> قطعه : </label>
                <input type="number"
                    id="num_piece"
                    name="numberof_piece"
                    value="0"
                    min="1"
                    max="1000">
                <br><br>
                <label for="num_grams"> عددالجرامات : </label>
                <input type="number"
                    id="num_grams"
                    name="numberof_grams"
                    value=""
                    min="1"
                    max="5000"><br>
                <label for="num_quantity"> الكميه : </label>
                <br>
                <input type="number"
                    id="num_quantity"
                    name="numberof_quantity"
                    value="1"
                    min="1"
                    max="1000"><br><br>
                <br>
                <textarea rows="4"
                    cols="50"
                    name="new_item"
                    value=""
                    placeholder="الوصف ">
                    </textarea>
                <br>
                <input type="button"
                    value="اضافة صنف جديد ">
                <br><br>

            </fieldset>
        </fieldset>
    </form>

    <script src="JS/dashboard.js"></script>
</body>

</html>