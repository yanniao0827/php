<?php
header('Content-Type: application/json'); //告訴電腦這裡是使用php格式

$ar5 = [
    'name' => [
        'first' => 'Leana',
        'last' => 'Chen'
    ],
    'age' => 22,
    'gender' => 'female',
];

echo json_encode($ar5);
