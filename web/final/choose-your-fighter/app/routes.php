<?php

    $GetRoute("index", null, function () use ($Middleware, $request) {
        $Middleware['auth']();
        require __DIR__ . "/controllers/dashboard.php";
    });

    $GetRoute("auth", "login", function () use ($Middleware, $request) {
        $Middleware['guest']();
        require __DIR__ . "/controllers/getLogin.php";
    });

    $PostRoute("auth", "login", function () use ($Middleware, $request) {
        $Middleware['guest']();
        require __DIR__ . "/controllers/postLogin.php";
    });

    $GetRoute("auth", "register", function () use ($Middleware, $request) {
        $Middleware['guest']();
        require __DIR__ . "/controllers/getRegister.php";
    });

    $PostRoute("auth", "register", function () use ($Middleware, $request) {
        $Middleware['guest']();
        require __DIR__ . "/controllers/postRegister.php";
    });

    $GetRoute("logout", null, function () {
        unset($_SESSION['auth']);
        session_regenerate_id();
    
        header("Location: /auth/login");
    });

    $PostRoute("fighter", "upload", function () use ($Middleware, $request) {
        $Middleware['auth']();
        require __DIR__ . "/controllers/uploadFighter.php";
    });

    $GetRoute("fighter", "select", function () use ($Middleware, $request) {
        $Middleware['admin']();
        require __DIR__ . "/controllers/selectFighter.php";
    });

    $GetRoute("fighter", "all", function () use ($Middleware, $request) {
        $Middleware['admin']();
        require __DIR__ . "/controllers/getAllFighters.php";
    });

    $GetRoute("fighter", "get", function () use ($Middleware, $request) {
        $Middleware['admin']();
        require __DIR__ . "/controllers/getFighter.php";
    });

    require __DIR__ . "/views/404.php";