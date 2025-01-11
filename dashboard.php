<?php
session_start(); // เริ่มต้น session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Hotel Booking</title>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow-y: scroll;
            scrollbar-width: none;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        /* สไตล์ข้อความเลื่อน */
        .scrolling-banner {
            box-shadow: 0px 1px 3px #00000040;
    width: 100%;
    background: #dedede7d;
    color: #000000;
    font-size: 18px;
    white-space: nowrap;
    overflow: hidden;
    position: relative;
    box-sizing: border-box;
    height: 40px;
    line-height: 40px;     
        }

        .scrolling-banner .text {
            display: inline-block;
            position: absolute;
            white-space: nowrap;
            animation: scroll-left-to-right 19s linear infinite;
        }

        /* เพิ่มข้อความซ้ำ */
        .scrolling-banner .text span {
            display: inline-block;
            margin-right: 100%; /* กำหนดช่องว่างระหว่างข้อความ */
        }

        @keyframes scroll-left-to-right {
            0% {
                transform: translateX(100%); /* เริ่มจากขอบขวา */
            }
            100% {
                transform: translateX(-100%); /* ไปขอบซ้าย */
            }
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="background"></div>
        <div class="content">
            <h1>Welcome to BookHotel</h1>
            <p>Book your dream stay with us today!</p>
        </div>
    </div>

    <!-- ข้อความเลื่อน -->
    <div class="scrolling-banner">
        <div class="text">
            <span>Welcome <?php echo isset($_SESSION['sess_username']) ? htmlspecialchars($_SESSION['sess_username'], ENT_QUOTES, 'UTF-8') : 'Guest'; ?>! Enjoy the Ultimate Experience at BookHotel! Luxury stays, amazing deals, and unforgettable memories await you!</span>
        </div>
    </div>

    <section class="features">
        <div class="feature">
        <div class="feature-body">
            <img class="imgrm" src="img/roomstandard.jpg" alt="Standard">
            <h3>Standard room</h3>
            <p>Comfortable and affordable, perfect for a relaxing stay with all the essential amenities.</p>
            <p>Price: 500 bath/Day</p>
        </div>
        <div style="margin-top: 35px;">
            <a class="action" href="content/roomstandard.php">View details</a>
        </div>
        </div>
        <div class="feature">
        <div class="feature-body">
            <img class="imgrm" src="img/roomsweet.jpg" alt="Sweet">
            <h3>Sweet room</h3>
            <p>A cozy and charming room offering exclusive discounts for a memorable stay.</p>
            <p>Price: 1500 bath/Day</p>
        </div>
        <div style="margin-top: 35px;">
            <a class="action" href="content/roomsweet.php">View details</a>
        </div>
        </div>
        <div class="feature">
        <div class="feature-body">
            <img class="imgrm" src="img/roomvip.jpg" alt="Vip">
            <h3>Vip room</h3>
            <p>Luxurious and fully serviced, with 24/7 assistance for an exceptional experience.</p>
            <p>Price: 3000 bath/Day</p>
        </div>
        <div style="margin-top: 35px;">
            <a class="action" href="content/roomvip.php">View details</a>
        </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Hotel Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
