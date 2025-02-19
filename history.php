<?php
// เริ่มต้น session
session_start();

// ตรวจสอบว่า session ของผู้ใช้ถูกตั้งค่าแล้วหรือไม่
if (!isset($_SESSION['sess_id'])) {
    header('Location: ../login.php'); 
    exit();
}

// เรียกใช้ไฟล์ connect.php
include 'connect.php';

// ดึง user_id ของผู้ใช้ที่ล็อกอินจาก session
$user_id = $_SESSION['sess_id'];  // ใช้ sess_id แทน user_id

// ดึงข้อมูลจากตาราง tb_booking โดยกรองตาม user_id
$sql = "SELECT * FROM tb_booking WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);  // Bind user_id เป็นชนิด integer
$stmt->execute();  // รันคำสั่ง SQL
$result = $stmt->get_result();  // ดึงผลลัพธ์ของคำสั่ง SQL
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/his.css">
    <title>Hotel Booking</title>

    <style>
        .status-waiting {
    color: orange;
    text-shadow: 0 0 15px rgb(191, 143, 0);
}

.status-pending {
    color: red;
}

.status-completed {
    color: green;
    text-shadow: 0 0 15px #007e26;
    
}

.status-completed-1 a {
    border-radius: 5px;
    padding: 7px 12px;
    background: #007e26;
    color:rgb(255, 255, 255);
    text-decoration: none;
}

.status-canceled {
    color: #ff0000;
    text-shadow: 0 0 15px #ae0000;
}

.status-pending a {
    border-radius: 5px;
    padding: 7px 12px;
    background: orange;
    color: #ffffff;
    text-decoration: none;
}

    </style>
</head>
<body>

<header class="header">
    <div class="container">
      <h1 class="logo">เดอะการ์เดนโฮเทล</h1>
      <nav class="nav">
        <ul>
          <li><a href="dashboard.php">บ้าน</a></li>
          <li><a href="history.php?user_id=<?php echo $_SESSION['sess_id']; ?>">ประวัติ</a></li>
          <li><a href="contact.php">ติดต่อ</a></li>
          <li><a href="javascript:history.back()">กลับ</a></li>
          <li><a style="color: #ff5d5d;" href="logout.php">ล๊อคเอาท์</a></li>
        </ul>
      </nav>
    </div>
</header>

<h1 class="headtx">ประวัติการจอง</h1>
<table>
<thead>
    <tr>
        <th>ชื่อ</th>
        <th>เบอร์</th>
        <th>เช็คอิน</th>
        <th>เช็คเอาท์</th>
        <th>ราคา</th>
        <th>ห้อง</th>
        <th>หมายเลขห้อง</th>
        <th>สถานะ</th>
        <th>การกระทำ</th> <!-- เพิ่มคอลัมน์ใหม่ -->
    </tr>
</thead>
<tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $statusClass = '';
            $statusContent = $row['status'];

            if ($row['status'] == 'รอตอบกลับ') {
                $statusClass = 'status-waiting';
                $statusContent = 'รอตอบกลับ';
            } elseif ($row['status'] == 'รอชำระ') {
                $statusClass = 'status-pending';
                $statusContent = "<a href='payment.php?booking_id=" . $row['idpri'] . "'>กรุณาชำระเงิน</a>";
            } elseif ($row['status'] == 'ชำระเงินเสร็จสิ้น') {
                $statusClass = 'status-completed';
                $statusContent = 'ชำระเงินเสร็จสิ้น';
            } elseif ($row['status'] == 'ยกเลิก') {
                $statusClass = 'status-canceled';
                $statusContent = 'ยกเลิก';
            } elseif ($row['status'] == 'ยืนยัน') {
                $statusClass = 'status-completed-1';
                $statusContent = "<a href='slip.php?booking_id=" . $row['idpri'] . "'>เสร็จสิ้น</a>";
            } 

            $idRoomContent = empty($row['id_room']) ? 'wait confirm' : $row['id_room'];

            echo "<tr>";
            echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['checkin'] . "</td>";
            echo "<td>" . $row['checkout'] . "</td>";
            echo "<td>" . number_format($row['price'], 2) . "</td>";
            echo "<td>" . $row['roomtype'] . "</td>";
            echo "<td>" . $idRoomContent . "</td>";
            echo "<td class='$statusClass'>" . $statusContent . "</td>";

            // แสดงปุ่ม "ยกเลิก" ถ้าสถานะเป็น "รอตอบกลับ" หรือ "รอชำระ"
            echo "<td>";
            if ($row['status'] == 'รอตอบกลับ' || $row['status'] == 'รอชำระ') {
                echo "<a href='cancel_booking.php?booking_id=" . $row['idpri'] . "' onclick='return confirm(\"คุณต้องการยกเลิกการจองนี้หรือไม่?\")' class='cancel-button'>ยกเลิก</a>";
            }
            echo "</td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No information found.</td></tr>";
    }
    ?>
</tbody>

</table>

<footer class="footer">
    <div class="container">
      <p>© 2024 Book a hotel. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
