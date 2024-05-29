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
                            <a href="order.php" class="nav_link">Orders</a>
                        </li>
                        <li class="nav_item">
                            <a href="sales.php" class="nav_link">Sales</a>
                        </li>
                        <li class="nav_item">
                            <a href="transaction.php" class="nav_link active-link">Transactions</a>
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