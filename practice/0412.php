<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "網頁標題" ?></title>
</head>

<body>
    <?php
    echo __FILE__;
    echo "<br>";
    echo __DIR__;
    echo "<br>";
    echo __LINE__;
    echo "<br>";
    echo true;
    echo "<br>";
    echo false;
    echo "<br>";
    echo false ? "true" : "false";
    ?>
</body>

</html>