<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Image Drop Box</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php
    require_once '../common/nav.php';
    echo '<br>';
    ?>
    <form method="POST" action="/admin/uploader.php" enctype="multipart/form-data">
        <div class="box-upload">
            <?php
                if (isset($_SESSION['message']) && $_SESSION['message'])
                {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                if(isset($_SESSION['file2replace'])){
                    echo '<h1>Select Image to Replace with:</h1>';
                }
                else {
                    echo '<h1>Select Image to Upload:</h1>';
                }
            ?>
            <input type="file" class="select-button" name="selected_file">
            <input type="submit" class="upload-button" name="btnUpload" value="Upload">
        </div>
    </form>
</body>
</html>