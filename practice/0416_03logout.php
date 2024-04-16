<?php

session_start();

unset($_SESSION['admin']);

header('Location: 0416_02login.php');
