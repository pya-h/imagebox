<?php
session_start();
?>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/admin.css" />
</head>
<body>
    <?php
        require_once '../common/nav.php';
        echo <<<_END
                <div class="admin-panel-container">
                    <h1 class="admin-panel-title">Admin Panel</h1>
                    <div class="admin-panel-menu">
                        <a href="/admin/upload" class="menu-item">Upload new Image</a>
                        <a href="/admin/edit" class="menu-item">&nbsp&nbsp&nbsp Edit Images &nbsp&nbsp&nbsp</a>
                    </div>
               </div>
            _END;
    ?>
</body>
</html>