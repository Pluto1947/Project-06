<?php
require_once('../../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '/uploads/';
        $fileName = basename($_FILES['photo']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Create the uploads directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {
            // Insert the file path into the database
            $id = $_POST['id'];
            $sql = "INSERT INTO dorm_gallery (dorm_id, file_path) VALUES ('$id', '$targetFilePath')";

            if ($conn->query($sql) === TRUE) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'failed', 'msg' => 'Database error: ' . $conn->error]);
            }
        } else {
            echo json_encode(['status' => 'failed', 'msg' => 'File upload error.']);
        }
    } else {
        echo json_encode(['status' => 'failed', 'msg' => 'No file uploaded or upload error.']);
    }
}
?>
