<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: Deliver.php");
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM client_table WHERE id = ?");
$stmt->execute([$id]);

header("Location: Deliver.php");
exit();
?>