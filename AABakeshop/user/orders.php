<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/cake_logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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
        td img {
            width: 100px; /* Adjust as necessary */
            height: auto;
        }
        h1 {
            text-align: center;
            margin-top: 100px;
            margin-bottom: 20px;
        }
        .receive-btn {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .receive-btn:hover {
            background-color: #45a049;
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
                        <a href="orders.php" class="nav_link active-link">My Orders</a>
                    </li>
                </ul>

                <!-- close button -->
                <div class="nav_close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>

                <img src="assets/img/leaf-branch-4.png" alt="nav image" class="nav_img-1">
                <img src="assets/img/leaf-branch-3.png" alt="nav image" class="nav_img-2">
            </div>
                            
            <li class="nav_item">
                <a href="logout.php" class="nav_link">Logout</a>
            </li>

            <a href="carts.php" class="cart_button" onclick="toggleCart()">
                <i class="ri-shopping-cart-2-line"></i>
            </a>
                           
            <a href="#" class="account_button" onclick="toggleAccount()">
                <i class="ri-account-circle-line"></i>
            </a>
        </nav>
    </header>


    <div class="container">
        <h1>My Orders</h1>
        <table>
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                include_once '../db_connection.php';
                
                // SQL query to fetch orders with order date
                $sql = "SELECT o.order_id, o.order_date, p.product_image, p.product_name, o.quantity, o.price, (o.quantity * o.price) as subtotal, o.status
                        FROM orders o
                        JOIN products p ON o.product_id = p.product_id";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><img src='".$row["product_image"]."' alt='".$row["product_name"]."'></td>";
                        echo "<td>".$row["product_name"]."</td>";
                        echo "<td>".$row["quantity"]."</td>";
                        echo "<td>".$row["price"]."</td>";
                        echo "<td>".$row["subtotal"]."</td>";
                        echo "<td>".$row["order_date"]."</td>";
                        if ($row["status"] == 'pending') {
                            echo "<td id='status-".$row["order_id"]."'>Pick up after 3hrs</td>";
                            echo "<td><button class='receive-btn' onclick='receiveOrder(".$row["order_id"].")'>Receive</button></td>";
                        } else {
                            echo "<td id='status-".$row["order_id"]."'>".$row["status"]."</td>";
                            echo "<td>Received</td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No orders found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>  
    <script src="assets/js/main.js"></script>

    <script>
    function toggleCart() {
        var cart = document.getElementById("cart");
        cart.classList.toggle("active");
    }

    function receiveOrder(orderId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "receive_order.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "success") {
                    document.getElementById('status-' + orderId).innerText = "received";
                    document.querySelector('button[onclick="receiveOrder(' + orderId + ')"]').parentElement.innerHTML = "Received";
                } else {
                    alert("Error receiving order.");
                }
            }
        };
        xhr.send("order_id=" + orderId);
    }
    </script>
</body>
</html>
