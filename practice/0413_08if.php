<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $age = isset($_GET['age']) ? intval($_GET['age']) : 0;

    if ($age >= 18):
        ?>
        <div style="width:300px">
            <img src="https://m.media-amazon.com/images/M/MV5BOTA3NmU1NDMtYzcxMC00ZjI5LTllZWItYWI3MmZkNTE1ZTg0XkEyXkFqcGdeQW1hcmNtYW5u._V1_.jpg"
                width="100%" alt="">
        </div>
        <?php
    else:
        ?>
        <img src="https://static.scientificamerican.com/sciam/cache/file/2AE14CDD-1265-470C-9B15F49024186C10_source.jpg?w=300"
            alt="">
        <?php
    endif;
    ?>

</body>

</html>