<?php

$pw = '1234';
$hash = '$2y$10$VmqLLy0eq0gb9NDvmlTmmeX2Wqrmm0e.7GP8QTB/lfSPihEaNYYlS';

var_dump(password_verify($pw, $hash));