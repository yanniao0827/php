<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    td {
        width: 30px;
        height: 30px;
    }
</style>

<body>
    <table>
        <?php for ($i = 0; $i < 16; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < 16; $j++): ?>
                    <td style="background-color: #<?= sprintf('%X%X', $i, $j) ?>F"></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>