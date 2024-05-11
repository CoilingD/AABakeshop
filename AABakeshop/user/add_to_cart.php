<?php
session_start();
include '../db_connection.php'; // Database connection

$product_id = intval($_POST['product_id']); // Product ID from frontend
$session_id = session_id(); // Current user session

// Check if the product is already in the cart
$query = "SELECT quantity FROM carts WHERE session_id = ? AND product_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("si", $session_id, $product_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // If product exists, increase the quantity
    $stmt->bind_result($quantity);
    $stmt->fetch();
    $quantity += 1;

    $update_query = "UPDATE carts SET quantity = ? WHERE session_id = ? AND product_id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("isi", $quantity, $session_id, $product_id);
} else {
    // If product does not exist, add it with quantity 1
    $insert_query = "INSERT INTO carts (session_id, product_id, quantity) VALUES (?, ?, 1)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("si", $session_id, $product_id);
}

if ($stmt->execute()) {
    echo "Product added to cart!";
} else {
    echo "Failed to add product to cart!";
}

$stmt->close();
$conn->close();
?>
