<?php

    if ( !isset($_SESSION['auth']) )
    {
        $_SESSION['auth'] = array(
            "user" => null,
            "authenticated" => false
        );
    }

    require __DIR__ . "/database.php";

    $Middleware = require __DIR__ . "/middleware.php";

    require __DIR__ . "/requestHandler.php";
    require __DIR__ . "/../routes.php";