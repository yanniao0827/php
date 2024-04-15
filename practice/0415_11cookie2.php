<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>
        <?= isset($_COOKIE['my_cookie']) ? $_COOKIE['my_cookie'] : '沒有設定 cookie !' ?>
    </h2>
</body>

</html>