<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Cakes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-image: url(images/bg1.jpg.jpg);
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .cakes {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .cake {
            width: 250px;
            margin: 0 20px 40px 0;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            text-align: center;
        }
        .cake img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .cake .price {
            font-weight: bold;
        }
        .cart-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-top: 20px;
        }
        .cart-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order Cakes</h1>
        
        <div class="cakes">
            <div class="cake">
                <img src="images/bg1.jpg" alt="Cake 1">
                <div class="price">$20</div>
            </div>

            <div class="cake">
                <img src="cake2.jpg" alt="Cake 2">
                <div class="price">$25</div>
            </div>

            <div class="cake">
                <img src="cake3.jpg" alt="Cake 3">
                <div class="price">$30</div>
            </div>

            <div class="cake">
                <img src="cake4.jpg" alt="Cake 4">
                <div class="price">$35</div>
            </div>

            <div class="cake">
                <img src="cake5.jpg" alt="Cake 5">
                <div class="price">$40</div>
            </div>

            <div class="cake">
                <img src="cake6.jpg" alt="Cake 6">
                <div class="price">$45</div>
            </div>

            <div class="cake">
                <img src="cake7.jpg" alt="Cake 7">
                <div class="price">$50</div>
            </div>

            <div class="cake">
                <img src="cake8.jpg" alt="Cake 8">
                <div class="price">$55</div>
            </div>

            <div class="cake">
                <img src="cake9.jpg" alt="Cake 9">
                <div class="price">$60</div>
            </div>
        </div>

        <a href="ordering.html" class="cart-btn">Cart</a>
    </div>
</body>
</html>
