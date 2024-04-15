<?php
// date_default_timezone_set('Asia/Taipei'); 如果再php.ini中直接改時區就不用重複設定
echo date("Y-m-d H:i:s");
//現在時間
printf("<h2>%s</h2>", date("Y-m-d H:i:s", time()));
//一個月後時間
printf("<h2>%s</h2>", date("Y-m-d H:i:s", time() + 30 * 24 * 60 * 60));
//一個月後這天是星期幾
printf("<h2>%s</h2>", date("D:w", time() + 30 * 24 * 60 * 60));
//列出指定日期
$t = strtotime('2024-08-27');
printf("<h2>%s</h2>", date("Y-m-d H:i:s", $t));