<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="../assets/img/cake_logo.png" type="image/x-icon">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../css/style.css">

    <title>AA BAKESHOP</title>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav_logo">
                <img src="../assets/img/cake_logo.png" alt="logo image">
                AA BAKESHOP
            </a>

            <div class="nav_menu" id="nav-menu">
                <ul class="nav_list">
                    <li class="nav_item">
                        <a href="indexs.php" class="nav_link">Home</a>
                    </li>
                    <li class="nav_item">
                        <a href="indexs.php#about" class="nav_link">About us</a>
                    </li>
                    <li class="nav_item">
                        <a href="indexs.php#products" class="nav_link">Products</a>
                    </li>
                    <li class="nav_item">
                        <a href="indexs.php#newsletter" class="nav_link">Subscribe</a>
                    </li>

                    <li class="nav_item">
                        <a href="orders.php" class="nav_link">My Orders</a>
                    </li>
                </ul>

                <!-- close button -->
                <div class="nav_close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>

                <img src="../assets/img/leaf-branch-4.png" alt="nav image" class="nav_img-1">
                <img src="../assets/img/leaf-branch-3.png" alt="nav image" class="nav_img-2">
            </div>

            <li class="">
                <a href="logout.php" class="nav_link">Logout</a>
            </li>

            <a href="carts.php" class="cart_button active-link" onclick="toggleCart()">
                <i class="ri-shopping-cart-2-line"></i>
            </a>
                            
            <a href="#" class="account_button" onclick="toggleAccount()">
                <i class="ri-account-circle-line"></i>
            </a>
        </nav>
    </header>
    
    <!--==================== MAIN ====================-->
    <main class="main1">
        <!--==================== CART ====================-->
        <section class="popular_section" id="products">
            <h2 class="section title">My Cart</h2>
            <?php

            if (isset($_GET['error'])) {
                echo '<p style="color: red;">' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8') . '</p>';
            }

            if(isset($_GET['success']) && $_GET['success'] == 1) {
                echo '<p>Your order was successful!</p>';
            }

            // Display error message if payment amount does not match
            if(isset($_GET['payment_error']) && $_GET['payment_error'] == 1) {
                echo '<p style="color: red;">Payment does not match. Please try again.</p>';
            }
            ?>

            <div class="cart_container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        error_reporting(E_ALL);
                        ini_set('display_errors', 1);
                        include 'fetch_cart.php'; // Fetch cart data

                        if (isset($cart_items) && is_array($cart_items) && count($cart_items) > 0) {
                            $total = 0; // Initialize the total
                            foreach ($cart_items as $item) {
                                if (isset($item['product_name'])) {
                                    $total += $item['subtotal']; // Calculate the total
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo htmlspecialchars($item['product_image'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($item['product_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="cart_img">
                                        </td>
                                        <td><?php echo htmlspecialchars($item['product_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" data-cart-id="<?php echo htmlspecialchars($item['cart_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </td>
                                        <td>₱<?php echo number_format($item['price'], 2); ?></td>
                                        <td class="subtotal">₱<?php echo number_format($item['subtotal'], 2); ?></td>
                                        <td>
                                            <form method="POST" action="remove_item.php">
                                                <input type="hidden" name="cart_id" value="<?php echo htmlspecialchars($item['cart_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                                <button type="submit">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="4" style="text-align: right;">Total:</td>
                                <td class="total">₱<?php echo number_format($total, 2); ?></td>
                                <td></td> <!-- Empty cell for alignment -->
                            </tr>
                            <?php
                        } else {
                            echo "<tr><td colspan='6'>Your cart is empty.</td></tr>"; // Handle empty cart
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Payment Form -->
            <div class="payment-form" style="margin-top: 20px; padding: 20px; background: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
    <h3 style="margin-bottom: 15px; color: #333;">Payment Information</h3>
    <form method="POST" action="checkout_process.php">
        <p style="margin-bottom: 10px; color: #333;">Shop Gcash Number: <strong>0917-123-4567</strong></p>
        <label for="gcash_name" style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">User Gcash Name:</label>
        <input type="text" id="gcash_name" name="gcash_name" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">

        <label for="gcash_number" style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">User Gcash Number:</label>
        <input type="text" id="gcash_number" name="gcash_number" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">

        <label for="amount" style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">

        <input type="hidden" name="total_amount" value="<?php echo number_format($total, 2); ?>">

        <input type="submit" value="Checkout" style="background: #007bff; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; transition: background 0.3s ease;">
    </form>
</div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer">
        <!-- Footer content -->
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>

    <!--=============== SCROLLREVEAL ===============-->
    <script src="../assets/js/ScrollReveal.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="../assets/js/main.js"></script>
    <script>
    // Function to change the quantity of a cart item and update subtotal
    function changeQuantity(cartId, inputField) {
        var newQuantity = parseInt(inputField.value);
        var price = parseFloat(inputField.parentNode.nextElementSibling.innerText.replace('₱', '').replace(',', ''));
        var subtotalCell = inputField.parentNode.nextElementSibling.nextElementSibling;
        var newSubtotal = price * newQuantity;
        subtotalCell.innerText = '₱' + newSubtotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        updateTotal();
    }

    function updateTotal() {
        var subtotalCells = document.querySelectorAll('.subtotal');
        var totalCell = document.querySelector('.total');
        var total = 0;
        subtotalCells.forEach(cell => {
            var subtotal = parseFloat(cell.innerText.replace('₱', '').replace(',', ''));
            total += subtotal;
        });
        totalCell.innerText = '₱' + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    var quantityInputs = document.querySelectorAll('input[type="number"]');
    quantityInputs.forEach(input => {
        input.addEventListener('input', function() {
            var cartId = this.dataset.cartId;
            changeQuantity(cartId, this);
        });
    });
    </script>
</body>
</html>
