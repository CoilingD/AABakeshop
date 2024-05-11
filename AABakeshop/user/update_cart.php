<?php
session_start(); // Ensure session is active
include '../db_connection.php.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle quantity updates
    if (isset($_POST['update'])) {
        foreach ($_POST['quantity'] as $cart_id => $quantity) {
            $query = "UPDATE carts SET quantity = ? WHERE cart_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $quantity, $cart_id);
            $stmt->execute();
            $stmt->close(); // Always close statements
        }
    }

    // Handle deletions
    if (isset($_POST['delete'])) {
        $cart_id = $_POST['delete'];
        $query = "DELETE FROM carts WHERE cart_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $cart_id);
        $stmt->execute();
        $stmt->close(); // Always close statements
    }
}

header("Location: cart.php"); // Redirect back to cart.php after updates
exit;
