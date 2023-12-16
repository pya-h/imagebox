<?php
    session_start();
    require_once '../common/config.php';
    function get_file_name(string $url): string{
        $url_components = parse_url($url);
        parse_str($url_components['query'], $params);
        return $params['file'];
    }
    if(!$_SESSION['id']) {
        require './login.php';
    }
    else {
        $request = $_SERVER['REQUEST_URI'];
        $url_split = explode("/", $request);
        $child_path = \array_filter($url_split, static function ($element) {
            return $element !== "" && $element !== "/" && $element !== "admin";
        }); // removing "/" or "" or "admin" elements cause their not needed here
        $child_path = array_values($child_path); // resetting indexes
        $current_path = $child_path[0];
        if($current_path === 'upload'){
            require __DIR__ . '/upload_panel.php';
        }
        else if($current_path === 'edit'){
            $_SESSION['file2replace'] = null; // resetting old failed replace requests
            require __DIR__ . '/edit.php';
        }
        else if($current_path  === 'delete'){
            if(count($child_path) === 2) {
                $file = get_file_name($request);
                if(!$file){
                    $_SESSION['message'] = '<div class="edit-error">Image filename is not specified correctly!</div>';
                }
                else{
                    $old_file_path = '..' . PHOTOS_DIR . $file;
                    if(!file_exists($old_file_path)){
                        $_SESSION['message'] = '<div class="edit-error">There is no such file to delete!</div>';
                    }
                    unlink($old_file_path);
                    $_SESSION['message'] = '<div class="edit-success">Image was successfully deleted.</div>';
                }
            }
            else {
                $_SESSION['message'] = '<div class="edit-error">Something went wrong while trying to delete the image!</div>';
            }
            redirect2('admin/edit' );
        }
        else if($current_path === 'replace'){
            $file = get_file_name($request);
            if(!$file){
                $_SESSION['message'] = '<div class="edit-error">Image filename is not specified correctly!</div>';
                redirect2('admin/edit' );
            }
            else {
                $old_file_path = '..' . PHOTOS_DIR . $file;
                if(!file_exists($old_file_path)){
                    $_SESSION['message'] = '<div class="edit-error">There is no such file to replace!</div>';
                    redirect2('admin/edit' );
                }
                else{
                    $_SESSION['file2replace'] = $file;
                    redirect2('admin/upload');
                }
            }
        }
        else {
            $_SESSION['file2replace'] = null; // resetting old failed replace requests
            require __DIR__ . '/panel.php';
        }
    }

