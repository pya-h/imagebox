<?php
    defined('PHOTOS_DIR') or define('PHOTOS_DIR', '/media/');

    defined('DB_HOST') or define('DB_HOST', '127.0.0.1');
    defined('DB_USERNAME') or define('DB_USERNAME', 'root');
    defined('DB_PASSWORD') or define('DB_PASSWORD', '');
    defined('DB_NAME') or define('DB_NAME','imagedropbox_db');

    defined('TABLE_ADMINS') or define('TABLE_ADMINS', 'admins');
    defined('ADMIN_ID') or define('ADMIN_ID', 'ID');
    defined('ADMIN_PASSWORD') or define('ADMIN_PASSWORD', 'password');

    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);