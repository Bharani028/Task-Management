<?php
include "config.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];

    if (!empty($description)) {
        $stmt = $conn->prepare("INSERT INTO tasks (description, status, timestamp) VALUES (?, 'pending', NOW())");
        $stmt->bind_param("s", $description);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();
?>
