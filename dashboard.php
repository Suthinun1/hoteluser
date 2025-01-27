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
    display: flex;  
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

        .login-btn{
            font-weight: 600;
            border: solid 5px white;
    /* font-size: 10px; */
    border-radius: 10px;
    color: white;
    display: flex;
    background: #ffb31d;
    width: 100px;
    padding: 1px;
    margin: 0;
    /* margin-left: 10px; */
    justify-content: center;
    z-index: 1;
    align-items: center;
        }
        .logout-btn{
            font-weight: 600;
            border: solid 5px white;
    /* font-size: 10px; */
    border-radius: 10px;
    color: white;
    display: flex;
    background: #ff1d1d;
    width: 100px;
    padding: 1px;
    margin: 0;
    /* margin-left: 10px; */
    justify-content: center;
    z-index: 1;
    align-items: center;
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="background"></div>
        <div class="content">
            <h1>ยินดีต้อนรับสู่โรงแรมเดอะการ์เดน</h1>
            <p>จองห้องในฝันของคุณกับเราวันนี้!</p>
        </div>
    </div>

<!-- ข้อความเลื่อน -->
<div class="scrolling-banner">
    <?php if (isset($_SESSION['sess_username'])): ?>
        <!-- ปุ่มล็อคเอ้าท์ -->
        <a href="logout.php" class="log-ban logout-btn">ล็อคเอ้าท์</a>
    <?php else: ?>
        <!-- ปุ่มล็อคอิน -->
        <a href="login.php" class="log-ban login-btn">ล็อคอิน</a>
    <?php endif; ?>
    <div class="text">
        <div>
            <span>
                ยินดีต้อนรับ <?php echo isset($_SESSION['sess_username']) ? htmlspecialchars($_SESSION['sess_username'], ENT_QUOTES, 'UTF-8') : '???'; ?> 
                เพลิดเพลินไปกับประสบการณ์ขั้นสุดยอดที่เดอะการ์เดน ที่พักสุดหรู ข้อเสนอสุดพิเศษ และความทรงจำอันน่าจดจำรอคุณอยู่!
            </span>
        </div>
    </div>
</div>

    <section class="features">
        <div class="feature">
        <div class="feature-body">
            <img class="imgrm" src="img/roomstandard.jpg" alt="Standard">
            <h3>ห้องมาตรฐาน</h3>
            <p>สะดวกสบายและราคาไม่แพง เหมาะสำหรับการพักผ่อนอย่างผ่อนคลาย</p>
            <p>ราคา: 500 บาท/วัน</p>
        </div>
        <div style="margin-top: 35px;">
            <a class="action" href="content/roomstandard.php">ข้อมูลเพิ่มเติม</a>
        </div>
        </div>
        <div class="feature">
        <div class="feature-body">
            <img class="imgrm" src="img/roomsweet.jpg" alt="Sweet">
            <h3>ห้องสวีท</h3>
            <p>ห้องพักแสนสบายและมีเสน่ห์มอบส่วนลดพิเศษสำหรับการเข้าพักที่น่าจดจำ</p>
            <p>ราคา: 1500 บาท/วัน</p>
        </div>
        <div style="margin-top: 35px;">
            <a class="action" href="content/roomsweet.php">ข้อมูลเพิ่มเติม</a>
        </div>
        </div>
        <div class="feature">
        <div class="feature-body">
            <img class="imgrm" src="img/roomvip.jpg" alt="Vip">
            <h3>ห้องวีไอพี</h3>
            <p>หรูหราและบริการครบครัน พร้อมความช่วยเหลือตลอด 24 ชั่วโมงทุกวันเพื่อประสบการณ์สุดพิเศษ</p>
            <p>ราคา: 3000 บาท/วัน</p>
        </div>
        <div style="margin-top: 35px;">
            <a class="action" href="content/roomvip.php">ข้อมูลเพิ่มเติม</a>
        </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Hotel Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
