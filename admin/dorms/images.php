<?php
$dir = "uploads/";
$images = [];

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != "..") {
                $images[] = $dir . $file;
            }
        }
        closedir($dh);
    }
}

header('Content-Type: application/json');
echo json_encode($images);
?>
