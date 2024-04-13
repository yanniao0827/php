<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <?php for ($i = 1; $i <= 9; $i++): ?>
            <tr>
                <?php for ($j = 1; $j <= 9; $j++): ?>
                    <td><?= sprintf('%s * %s =%s', $i, $j, $i * $j) ?></td> <!-- %s代表空洞，有三個洞代表要給入三個值 -->
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>