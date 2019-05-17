<?php

    $AuthMiddleware = function ()
    {
        if (!$_SESSION['auth']['authenticated'])
        {
            header("Location: /auth/login");
        }
    };

    $GuestMiddleware = function ()
    {
        if ($_SESSION['auth']['authenticated'])
        {   
            header("Location: /");
        }
    };

    $AdminMiddleware = function () use ($AuthMiddleware)
    {
        $AuthMiddleware();
        if ($_SESSION['auth']['user']['is_admin'] != '1')
        {   
            header("Location: /");
        }
    };

    // Register Middleware
    return array(
        "auth" => $AuthMiddleware,
        "guest" => $GuestMiddleware,
        "admin" => $AdminMiddleware
    );