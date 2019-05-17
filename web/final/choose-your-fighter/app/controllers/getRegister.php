<?php

    $errorMsg = isset($_SESSION['err']) ? $_SESSION['err'] : null;
    unset($_SESSION['err']);

    require __DIR__ . "/../views/register.php";