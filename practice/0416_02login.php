<?php
session_start();
$users = [
    'yan' => [
        'pw' => '2345',
        'nickname' => '彥寧'
    ],
];

#先判斷是否有送表單
if (!empty($_POST)) {
    $errInfo = "帳號或密碼錯誤"; # 預設的錯誤訊息

    # 1. 判斷帳號是否正確
    if (!empty($users[$_POST['account']])) {
        $item = $users[$_POST['account']]; # 帳號不是空值，確認帳號是否有對應到用戶資料yan

        # 2. 帳號等於yan，接著判斷密碼是否等於2345
        if ($item['pw'] === $_POST['password']) {
            # 帳密都對了，把預設錯誤訊息拿掉
            unset($errInfo);
            $_SESSION['admin'] = [
                'account' => $_POST['account'],
                'nickname' => $item['nickname']
            ];

        } else {
            # 密碼是錯的
        }

    } else {
        # 帳號是錯的
    }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_SESSION['admin'])): ?>
        <h2><?= $_SESSION['admin']['nickname'] ?> 泥好</h2>
        <p><a href="0416_03logout.php">登出</a></p>
    <?php else: ?>

        <div><?= isset($errInfo) ? $errInfo : '' ?></div>

        <form action="" method="post">
            <input type="text" name="account" placeholder="帳號" value="<?= htmlentities($_POST['account'] ?? '') ?>">
            <!-- value後面的意思是如果帳號密碼都還沒設定的話，就放空字串，語法是兩個問號 -->
            <br>
            <input type="password" name="password" placeholder="密碼" value="<?= htmlentities($_POST['password'] ?? '') ?>">
            <br>
            <input type="submit">
        </form>

    <?php endif ?>
</body>

</html>