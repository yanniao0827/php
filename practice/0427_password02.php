<?php

$pw = '12222';
$hash = '$2y$10$B1.WhdzNIcmB9FPQMO3hO.v4wC8E3j28SzlxmJj3sbPe6ajaLJbLu';

var_dump(password_verify($pw, $hash));