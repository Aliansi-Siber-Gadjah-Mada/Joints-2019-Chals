<?php

    // $x = [
    //     getenv("DB_CONNECTION", "mysql"),
    //     getenv("DB_HOST", "127.0.0.1"),
    //     getenv("DB_PORT", 3306),
    //     getenv("DB_DATABASE", "homestead"),
    //     getenv("DB_USERNAME", "root"),
    //     getenv("DB_PASSWORD", "")
    // ];

    // $x = new PDO('mysql:host=db;dbname=jointsmantap;charset=utf8mb4', 'root', 'jointsmantap123');

    // var_dump($x);
    // die();

    $db = Database::getInstance();

    $stmtLogin = $db->prepare(
        "select * from users where username = :username "
    );
    $stmtLogin->bindParam(":username", $request["username"]);
    $stmtLogin->execute();

    $user = $stmtLogin->fetch();

    if (!$user)
    {
        header("Location: /auth/login?err=1");
        exit();
    }

    if (password_verify($request['password'], $user['password']))
    {
        $_SESSION['auth']['user'] = $user;
        $_SESSION['auth']['authenticated'] = true;

        header("Location: /");
    }
    else
    {
        header("Location: /auth/login?err=1");
    }
    
    exit();