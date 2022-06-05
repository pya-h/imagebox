<?php
    session_start();
    $request = $_SERVER['REQUEST_URI'];
    switch($request){
        case '/':
        case '':
        case '/home':
            require __DIR__ . '/home.php';
            break;
        case '/admin':
            require __DIR__ . '/admin/index.php';
            break;
        case '/logout':
            $_SESSION['id'] = $_SESSION['password'] = '';
            header("Location: /");
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/404.php';
            break;
    }
