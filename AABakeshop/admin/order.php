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
        <link rel="stylesheet" href="../css/styles.css">

        <title>AA BAKESHOP</title>
        <style>
        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        
        /* Heading styles */
        h1 {
            text-align: center;
            margin-top: 100px; /* Adjust this value to lower the heading */
            margin-bottom: 20px;
        }

        .total-row td {
            font-weight: bold;
        }
    </style>

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
                            <a href="index.php" class="nav_link ">Home</a>
                        </li>
                        <li class="nav_item">
                            <a href="products.php" class="nav_link">Products</a>
                        </li>
                        <li class="nav_item">
                            <a href="order.php" class="nav_link active-link">Orders</a>
                        </li>
                        <li class="nav_item">
                            <a href="sales.php" class="nav_link">Sales</a>
                        </li>
                        <li class="nav_item">
                            <a href="transaction.php" class="nav_link">Transactions</a>
                        </li>
                    </ul>

                    <!-- close button -->
                    <div class="nav_close" id="nav-close">
                        <i class="ri-close-line"></i>
                    </div>

                    <img src="assets/img/leaf-branch-4.png" alt="nav image" class="nav_img-1">
                    <img src="assets/img/leaf-branch-3.png" alt="nav image" class="nav_img-2">
                </div>
                                
                <a href="#" class="account_button" onclick="toggleAccount()">
                    <i class="ri-account-circle-line"></i>
                </a>

                <div class="nav_buttons">
                    <!-- Theme change button -->
                    <i class="ri-moon-line change-theme" id="theme-button"></i>

                    <!-- Toggle button -->
                    <div class="nav_toggle" id="nav-toggle">
                        <i class="ri-apps-2-line"></i>
                    </div>
                </div>
            </nav>

        </header>
        

        <div class="container">
        <h1>List of Orders</h1>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Order Date</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                include_once '../db_connection.php';
                
                // SQL query to fetch orders
                $sql = "SELECT * FROM orders";
                $result = $conn->query($sql);
                
                $totalSubtotal = 0; // Initialize total subtotal
                
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        $totalSubtotal += $row["subtotal"]; // Add subtotal to total
                        echo "<tr>";
                        echo "<td>".$row["order_id"]."</td>";
                        echo "<td>".$row["user_id"]."</td>";
                        echo "<td>".$row["product_id"]."</td>";
                        echo "<td>".$row["product_name"]."</td>";
                        echo "<td>".$row["quantity"]."</td>";
                        echo "<td>".$row["price"]."</td>";
                        echo "<td>".$row["order_date"]."</td>";
                        echo "<td>".$row["subtotal"]."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No orders found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="7" style="text-align: right;">Total:</td>
                    <td><?php echo $totalSubtotal; ?></td>
                </tr>
            </tfoot>
        </table>
    </div>

        <script src="assets/js/main.js"></script>
       

        <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>

        <!--=============== SCROLLREVEAL ===============-->
        <script src="../assets/js/ScrollReveal.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="../assets/js/main.js"></script>
        <script>
        function toggleCart() {
            var cart = document.getElementById("cart");
            cart.classList.toggle("active");
        }
    </script>
    </body>
</html>