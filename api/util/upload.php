<?php
function upload($file, $dirUpload)
{
    $target_dir = $dirUpload;
    $target_file = $target_dir . basename($file['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra định dạng file
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "<script>alert('File ảnh không đúng định dạng')</script>";
        $uploadOk = 0;
    }

    // Kiểm tra upload
    if ($uploadOk == 0) {
        echo "<script>alert('Upload file ảnh thất bại')</script>";
    } else {
        move_uploaded_file($file["tmp_name"], $target_file);
    }
    return $uploadOk;
}