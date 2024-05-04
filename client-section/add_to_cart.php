<?php
session_start();

// Check if merchandise ID is provided
if (isset($_POST['merchandise_id'])) {
    // Initialize cart if not exists
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add merchandise to cart
    $merchandise_id = $_POST['merchandise_id'];
    $_SESSION['cart'][$merchandise_id] = isset($_SESSION['cart'][$merchandise_id]) ? $_SESSION['cart'][$merchandise_id] + 1 : 1;
    
    // Redirect back to merchandise page
    header("Location: merchandise.php");
    exit();
}
?>
