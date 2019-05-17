<?php
    $request = $_REQUEST;

    $method = $_SERVER['REQUEST_METHOD'];

    $page = !isset($_REQUEST['page']) || $_REQUEST['page'] == '' ? 'index' : $_REQUEST['page'];
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;

    $checkRoute = function ($reqMethod, $reqPage, $reqAction) use ($method, $page, $action)
    {
        return (
            $reqMethod === $method &&
            $reqPage === $page && 
            $reqAction === $action
        );
    };

    $GetRoute = function ($page, $action, $callable) use ($checkRoute)
    {
        if ( $checkRoute('GET', $page, $action) )
        {
            $callable();
            exit();
        }
    };

    $PostRoute = function ($page, $action, $callable) use ($checkRoute)
    {
        if ( $checkRoute('POST', $page, $action) )
        {
            $callable();
            exit();
        }
    };
