<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/styles.css" />
    <link rel="stylesheet" href="../css/login.css" />
</head>
<body>
    <?php
        require_once '../common/nav.php';
        require_once  '../common/config.php';

        $error = $ID = $password = "";
        if(isset($_POST['ID']))
        {
            if(!$connection){
                $error = '<div class="error">Cannot connect to the database!</div>';
            }
            else {
                $ID = $_POST['ID'];
                $password = $_POST['password'];

                if($ID === "" || $password === "") {
                    $error = '<div class="error">ID or password cannot be empty!</div>';
                }
                else {
                    $query = "SELECT * FROM `" . TABLE_ADMINS . "` WHERE ID='$ID' AND password='$password'";
                    $result = $connection->query($query);
                    if(!$result)
                        die($connection->error);
                    if($result->num_rows > 0){
                        $_SESSION['id'] = $ID;
                        $_SESSION['password'] = $password;
                    }
                    else {
                        $error = '<div class="error">Invalid ID or password!</div>';
                    }
                }

            }
        }
        if($_SESSION['id']) {
            header("Location: index.php" );
        }
        else {
            echo <<<_END
            <div class="box-input">
                <form action="/admin/login.php" method="POST">
                    $error
                    <h1 class="login-title">Admin Login</h1>
                    <input type="text" id="#ID"  name="ID" class="login-text-box" placeholder="ID" />
                    <input type="password" id="#password" name="password" class="login-text-box" placeholder="Password" />
                    <button type="submit" class="login-button">Login</button>
                </form>
            </div>
            _END;
        }
    ?>
</body>
</html>