<?php
session_start();
include '../db_connection.php'; // Ensure this path is correct

// Set the default time zone to your local time zone
date_default_timezone_set('Asia/Manila'); // Change to your desired time zone

// Ensure the user_id is available
if (!isset($_SESSION['user_id'])) {
    header("Location: carts.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$session_id = session_id();

try {
    // Fetch cart items for the user
    $cart_query = $conn->prepare("SELECT * FROM carts WHERE user_id = ? AND session_id = ?");
    $cart_query->bind_param("is", $user_id, $session_id);
    $cart_query->execute();
    $result = $cart_query->get_result();
    $cart_items = $result->fetch_all(MYSQLI_ASSOC);

    if (count($cart_items) > 0) {
        // Check if Gcash information and payment amount are set
        if (!isset($_POST['gcash_name']) || !isset($_POST['gcash_number']) || !isset($_POST['amount'])) {
            // Redirect back to carts.php with error message
            header("Location: carts.php?error=1");
            exit;
        }

        // Validate Gcash number (it should be numeric and have a specific length, e.g., 11 digits)
        if (!preg_match('/^\d{11}$/', $_POST['gcash_number'])) {
            // Redirect back to carts.php with error message
            header("Location: carts.php?error=invalid_gcash_number");
            exit;
        }

        // Calculate the total amount of the cart items
        $total_cart_amount = 0;
        foreach ($cart_items as $item) {
            $total_cart_amount += $item['subtotal'];
        }

        // Check if the payment amount matches the total cart amount
        if ($_POST['amount'] != $total_cart_amount) {
            // Redirect back to carts.php with payment error message
            header("Location: carts.php?payment_error=1");
            exit;
        }

        // Begin transaction
        $conn->begin_transaction();

        foreach ($cart_items as $item) {
            // Generate a tracking number for each order
            $tracking_number = generateTrackingNumber();
            $order_date = date('Y-m-d H:i:s');
            $status = 'pending';

            // Debugging step: Log POST data
            error_log("GCash Name: " . $_POST['gcash_name']);
            error_log("GCash Number: " . $_POST['gcash_number']);

            // Insert the order into the orders table
            $stmt = $conn->prepare("INSERT INTO orders (user_id, session_id, product_id, product_name, price, quantity, subtotal, order_date, status, tracking_number, gcash_name, gcash_number, payment_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isisdiissssss", $user_id, $session_id, $item['product_id'], $item['product_name'], $item['price'], $item['quantity'], $item['subtotal'], $order_date, $status, $tracking_number, $_POST['gcash_name'], $_POST['gcash_number'], $_POST['amount']);

            if (!$stmt->execute()) {
                throw new Exception("Failed to insert order item: " . $stmt->error);
            }

            // Decrease the stock of the product
            $update_stock = $conn->prepare("UPDATE products SET stock = stock - ? WHERE product_id = ?");
            $update_stock->bind_param("ii", $item['quantity'], $item['product_id']);

            if (!$update_stock->execute()) {
                throw new Exception("Failed to update product stock: " . $update_stock->error);
            }
        }

        // Commit transaction
        $conn->commit();

        // Clear the cart after successful order
        $clear_cart = $conn->prepare("DELETE FROM carts WHERE user_id = ? AND session_id = ?");
        $clear_cart->bind_param("is", $user_id, $session_id);
        $clear_cart->execute();

        // Redirect to carts.php with success message
        header("Location: carts.php?success=1");
        exit;
    } else {
        throw new Exception("No items in cart.");
    }
} catch (Exception $e) {
    // Rollback transaction on error
    if ($conn->errno) {
        $conn->rollback();
    }
    error_log("Error: " . $e->getMessage());
    header("Location: carts.php?error=" . urlencode("Failed to complete the order: " . $e->getMessage()));
    exit;
}
?>
