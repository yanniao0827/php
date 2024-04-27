<?php

require __DIR__ . '/../config/pdo-connect.php';
// 這個title指的是一般html中的document，在這個列表頁面我們把document命名成通訊錄列表
$title = "通訊錄列表";
$pageName = 'list';

$perPage = 20; //每頁最多要放幾筆資料

$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //如果page沒有設定，就列出第一頁資料
// 如果輸入的page<1，就跳到第一頁
if ($page < 1) {
    header('Location: ?page=1');
    exit;
}

$t_sql = "SELECT COUNT(*) FROM address_book"; //COUNT是用來數總共有多少筆資料，()內可以放隨意數字或*，結果都不會變，但不能留白

$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //把count得出來的總筆數放入$totalRows

$totalPages = ceil($totalRows / $perPage);
if ($page > $totalPages) {
    header("Location: ?page={$totalPages}");
    exit; # 結束這支程式
}

$totalPages = ceil($totalRows / $perPage); //兩者相除結果有餘數就無條件進入，比如如果共有21筆資料就分成兩頁

// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 0, 20
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 20, 20
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 40, 20
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 60, 20

$row = [];
if ($totalRows) {
    # 取得分頁資料
    $sql = sprintf(
        "SELECT * FROM `address_book` ORDER BY sid DESC LIMIT %s, %s",
        ($page - 1) * $perPage,
        $perPage
    );
    $rows = $pdo->query($sql)->fetchAll();
}

/*
echo json_encode([
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'page' => $page,
    'rows' => $rows,
]);
*/
?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container">
    <div class="row">
        <!-- 分頁按鈕回家作業 -->
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- 回到第一頁 -->
                    <li class="page-item ">
                        <a class="page-link" href="#">
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                    </li>
                    <!-- 回到第一頁結束 -->

                    <!-- 上一頁 -->
                    <li class="page-item ">
                        <a class="page-link" href="#">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <!-- 上一頁結束 -->
                    <?php for ($i = $page - 5; $i <= $page + 5; $i++):
                        if ($i >= 1 and $i <= $totalPages): ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endif;
                    endfor; ?>
                    <!-- 下一頁 -->
                    <li class="page-item ">
                        <a class="page-link" href="#">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                    <!-- 下一頁結束 -->
                    <li class="page-item ">
                        <a class="page-link" href="#">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><i class="fa-solid fa-trash"></i></th>
                        <th scope="col">#</th>
                        <th scope="col">姓名</th>
                        <th scope="col">Email</th>
                        <th scope="col">手機</th>
                        <th scope="col">生日</th>
                        <th scope="col">地址</th>
                        <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r): ?>
                        <tr>
                            <td><a href="javascript:deleteOne(<?= $r['sid'] ?>)">
                                    <i class="fa-solid fa-trash"></i>
                                </a></td>
                            <td><?= $r['sid'] ?></td>
                            <td><?= $r['name'] ?></td>
                            <td><?= $r['email'] ?></td>
                            <td><?= $r['mobile'] ?></td>
                            <td><?= $r['birthday'] ?></td>
                            <td><?= htmlentities($r['address']) ?></td>
                            <td>
                                <a href="edit.php?sid=<?= $r['sid'] ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    const deleteOne = (sid) => {
        if (confirm(`是否要刪除編號為${sid}的資料?`)) {
            location.href = `delete.php?sid=${sid}`;
        }
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>