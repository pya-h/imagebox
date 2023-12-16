<?php
session_start();
require_once '../common/config.php';
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
    ?>
    <div class="admin-panel-container">
        <h1 style="margin-bottom: 10rem;" class="admin-panel-title">Edit Images</h1>
        <?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            $media_dir = ".." . PHOTOS_DIR;
            $images = glob($media_dir . "*.*");

            foreach($images as $img){
                $filename_split = explode("/", $img);
                $short_filename = end($filename_split);
                echo <<<_END
                    <div class="image-card">
                        <div class="edit-menu-container">
                            <img src="$img" class="image-thumbnail" alt="error" />
                            <div class="edit-menu-anchors">
                                <a id="btnReplace" class="edit-anchor" href="/admin/replace/?file=$short_filename">Replace</a>
                                <a id="btnDelete" class="edit-anchor" href="/admin/delete/?file=$short_filename">Delete</a>
                           </div>
                        </div>
                   </div>
                _END;
            }
        ?>
   </div>
</body>
</html>