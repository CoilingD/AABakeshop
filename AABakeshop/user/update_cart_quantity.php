<?php
session_start();
include '../db_connection.php';

if (isset($_POST['cart_id']) && isset($_POST['change'])) {
    $cart_id = intval($_POST['cart_id']);
    $change = intval($_POST['change']);

    $query = "SELECT quantity FROM carts WHERE cart_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    $stmt->bind_result($current_quantity);
    $stmt->fetch();
    $stmt->close();

    $new_quantity = $current_quantity + $change;

    if ($new_quantity >= 1) { // Ensure quantity doesn't drop below 1
        $update_query = "UPDATE carts SET quantity = ? WHERE cart_id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ii", $new_quantity, $cart_id);
        $stmt->execute();
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Quantity can't be less than 1"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid data"]);
}

$conn->close();
?>
