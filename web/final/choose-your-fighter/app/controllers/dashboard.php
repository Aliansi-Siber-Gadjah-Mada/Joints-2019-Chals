<?php

    $uploadMsg = isset($_SESSION['uploadMsg']) ? $_SESSION['uploadMsg'] : null;
    unset($_SESSION['uploadMsg']);

    require __DIR__ . "/../views/dashboard.php";