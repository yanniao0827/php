<?php

setcookie("my_cookie", "my value", time() + 10);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>
        <?= $_COOKIE['my_cookie'] ?>
    </h2>
</body>

</html>