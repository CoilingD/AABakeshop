<?php
session_start();
include '../db_connection.php';

if (isset($_POST['cart_id'])) {
    $cart_id = intval($_POST['cart_id']);

    $delete_query = "DELETE FROM carts WHERE cart_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();

    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid data"]);
}

$conn->close();
?>
