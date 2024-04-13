<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="get" name="form1">
        <input type="text" name="account" placeholder="帳號">
        <br>
        <input type="password" name="password" placeholder="密碼"><br>
        <button type="submit">送出</button>

    </form>

    <!-- # 取得頁面上所有表單
    document.forms
    document.querySelectorAll('form')

     # 頁面上第一個表單(如表單未取名)
    document.forms[0]

    # 在console上取得已經有name的表單
    document.form1(表單的name)

    # 表單所有欄位 
    document.form1(表單的name).elements

     # 表單某個欄位 
    document.form1(表單的name).elements[0]
    document.form1(表單的name).elements['account(欄位的name)']
    document.form1(表單的name).account(欄位的name)

    # 表單某個欄位的值
    document.form1(表單的name).account(欄位的name).value -->
</body>

</html>