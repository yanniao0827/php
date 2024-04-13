<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre><?php var_dump($_POST) ?></pre>
    <!-- var_dump($_POST)可以把送出的表單資料用陣列方式列出，此時如果左上角重整頁面，陣列資料還在，但如果是點選網址列再按enter，陣列內資料會消失 -->
    <form action="" method="post" enctype="application/x-www-form-urlencoded">
        <!-- enctype可以不給，如果不給的話會自動預設成application/x-www-form-urlencoded -->
        <input type=" text" name="account" placeholder="帳號">
        <br>
        <input type="password" name="password" placeholder="密碼"><br>
        <button type="submit">送出</button>

    </form>


</body>

</html>