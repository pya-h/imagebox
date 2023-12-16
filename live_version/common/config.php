<?php
    defined('PHOTOS_DIR') or define('PHOTOS_DIR', '/media/');

    $env = parse_ini_file('.ini');
    defined('DB_HOST') or define('DB_HOST', '127.0.0.1');

    defined('TABLE_ADMINS') or define('TABLE_ADMINS', 'admins');
    defined('ADMIN_ID') or define('ADMIN_ID', 'ID');
    defined('ADMIN_PASSWORD') or define('ADMIN_PASSWORD', 'password');

    $connection = mysqli_connect(DB_HOST, $env['DB_USER'], $env['DB_PASSWORD'], $env['DB_NAME']);

    function redirect2(string $path): void {
        echo "<script>location='/$path'</script>";

    }


    function logText(string $text): void {
        $log_file = fopen("log.fux", "a");
        fwrite($log_file, $text . "\n");
        fclose($log_file);
    }