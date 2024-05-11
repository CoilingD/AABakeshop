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
                            <a href="#home" class="nav_link active-link">Home</a>
                        </li>
                        <li class="nav_item">
                            <a href="#about" class="nav_link">About us</a>
                        </li>
                        <li class="nav_item">
                            <a href="#products" class="nav_link">Products</a>
                        </li>
                        <li class="nav_item">
                            <a href="#newsletter" class="nav_link">Subscribe</a>
                        </li>
                    </ul>

                    <!-- close button -->
                    <div class="nav_close" id="nav-close">
                        <i class="ri-close-line"></i>
                    </div>

                    <img src="../assets/img/leaf-branch-4.png" alt="nav image" class="nav_img-1">
                    <img src="../assets/img/leaf-branch-3.png" alt="nav image" class="nav_img-2">
                </div>

                <a href="cart.php" class="cart_button" onclick="toggleCart()">
                    <i class="ri-shopping-cart-2-line"></i>
                </a>
                                
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

        <!--==================== MAIN ====================-->
        <main class="main">
          
            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <div class="about_container container grid">
                    <div class="about_data">
                        <span class="section_subtitle">About Us</span>
                        <h2 class="section_title about_title">
                            <div>
                                We Provide
                                <img src="../assets/img/small-cake-img-1.png" alt="about image">
                            </div>
                            High-quality Cake
                        </h2>

                        <p class="about_description">
                            Come try our delicious cakes! They're made with 
                            top-notch ingredients for a heavenly taste. 
                            Satisfy your cravings at our store today!
                        </p>
                    </div>
                    <img src="../assets/img/cupcakes-1.png" alt="about image" class="about_img">
                </div>
                <img src="../assets/img/leaf-3.png" alt="about image" class="about_img-1">
                    <img src="../assets/img/leaf-3.png" alt="about image" class="about_img-2">  
                <img src="../assets/img/leaf-branch-1.png" alt="about image" class="about_leaf">
            </section>


             
       
        <!--==================== FOOTER ====================-->
        <footer class="footer">
            <div class="footer_container container grid">
                <div>
                    <a href="#" class="footer_logo">
                        <img src="../assets/img/cake_logo.png" alt="logo image">
                        AABakeshop
                    </a>

                    <p class="footer_description">
                        AA Bakeshop is not just an <br> 
                        ordinary bakeshop. <br>
                        Every cake we make <br>
                        is made with love.
                    </p>
                </div>
                <div class="footer_content">
                    <div>
                        <h3 class="footer_title">Main Menu</h3>

                        <ul class="footer_links">
                            <li>
                                <a href="#about" class="footer_link">About</a>
                            </li>
                            <li>
                                <a href="#Products" class="footer_link">Menus</a>
                            </li>
                            <li>
                                <a href="#" class="footer_link">Offer</a>
                            </li>
                            <li>
                                <a href="#" class="footer_link">Events</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="footer_title">Information</h3>

                        <ul class="footer_links">
                            <li>
                                <a href="#" class="footer_link">Contact Us</a>
                            </li>
                            <li>
                                <a href="#" class="footer_link">Customers Feedback</a>
                            </li>

                        </ul>
                    </div>
                    <div>
                        <h3 class="footer_title">Address</h3>

                        <ul class="footer_links">
                            <li class="footer_information">
                                123 Street  <br>
                                Polangui, Albay
                            </li>
                            <li class="footer_information">
                                8AM - 4PM
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="footer_title">Social Media</h3>

                        <ul class="footer_social">
                            <a href="https://www.facebook.com/" target="_blank" class="footer_social-link">
                                <i class="ri-facebook-circle-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer_social-link">
                                <i class="ri-instagram-fill"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer_social-link">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </ul>
                    </div>
                </div>
                <img src="../assets/img/leaf-3.png" alt="footer image" class="footer_leaf-small">
                <img src="../assets/img/leaf-branch-4.png" alt="footer image" class="footer_leaf">
            </div>
            <div class="footer_info container">
                <div class="footer_card">
                    <img src="../assets/img/footer-card-1.png" alt="footer image">
                    <img src="../assets/img/footer-card-2.png" alt="footer image">
                    <img src="../assets/img/footer-card-3.png" alt="footer image">
                    <img src="../assets/img/footer-card-4.png" alt="footer image">
                </div>

                <span class="footer_copy">
                    &#169; AA BAKESHOP. 2024
                </span>
            </div>
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
        function toggleCart() {
            var cart = document.getElementById("cart");
            cart.classList.toggle("active");
        }
    </script>
    </body>
</html>