<?php
// Simple server-side save. Ensure folder "images" exists & is writable.
$targetDir = __DIR__ . "/images/";
if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);

if (!empty($_FILES['file']['tmp_name'])) {
    $name = basename($_FILES['file']['name']);
    // sanitize name
    $name = preg_replace('/[^A-Za-z0-9_.-]/', '_', $name);
    $targetFile = $targetDir . $name;
    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        echo $name;
    } else {
        http_response_code(500);
        echo "error";
    }
} else {
    echo "no_file";
}
?>