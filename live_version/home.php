
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Image Drop Box</title>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/home.css" />
</head>
<body>
    <?php
        require_once './common/config.php';
        require_once './common/nav.php';
        $media_dir = "." . PHOTOS_DIR;
        $images = glob($media_dir . "*.*");
        foreach($images as $img){
            echo <<<_END
                <a href="$img" download>
                    <img src="$img" class="image" />
                </a>
            _END;
        }
    ?>
</body>
</html>
