<?php
session_start();
require_once __DIR__ . '/../common/config.php';
$message = '';
if (isset($_POST['btnUpload']) && $_POST['btnUpload'] === 'Upload') {
    if (isset($_FILES['selected_file']) && $_FILES['selected_file']['error'] === UPLOAD_ERR_OK) {
        // get details of the uploaded file
        $temp_path = $_FILES['selected_file']['tmp_name'];
        $filename = $_FILES['selected_file']['name'];
        $file_size = $_FILES['selected_file']['size'];
        $file_type = $_FILES['selected_file']['type'];
        $filename_split_bydot = explode(".", $filename);
        $fileExtension = strtolower(end($filename_split_bydot));
        if($_SESSION['file2replace']){
            $unique_filename = $_SESSION['file2replace'];
            $old_file_path = __DIR__ . '/..' . PHOTOS_DIR . $unique_filename;
            if(!file_exists($old_file_path)){
                die("There is no such file to replace!");
            }
            unlink($old_file_path);
            unset($_SESSION['file2replace']);
        }
        else {
            $unique_filename = md5(time() . $filename) . '.' . $fileExtension;
        }
        // check if file has one of the following extensions
        $allowed_extensions = array('jpg', 'gif', 'png', 'jpeg');
        if (in_array($fileExtension, $allowed_extensions)) {
            // directory in which the uploaded file will be moved
            $upload_directory = __DIR__ . '/..' . PHOTOS_DIR;
            $destination = $upload_directory . $unique_filename;

            if (move_uploaded_file($temp_path, $destination)) {
                $message ='<div class="success">File was successfully uploaded.</div>';
            }
            else {
                $message ='<div class="error">There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.</div>';
            }
        } else {
            $text = 'Upload failed. Allowed file types: ' . implode(',', $allowed_extensions);
            $message ="<div class='error'>$text</div>";
        }
    } else {
        $text = 'There is some error in the file upload. Please check the following error.<br> Error:'
            . $_FILES['selected_file']['error'];
        $message ="<div class='error'>$text</div>";
    }
}
$_SESSION['message'] = $message;
redirect2("admin/upload");
