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
    <title>ประวัติการจอง</title>

    <style>
        .status-waiting {
            color: red;
        }
        .status-pending {
            color: orange;
        }
        .status-completed {
            color: green;
        }
        .status-pending a {
            color: orange; /* สีลิงก์เมื่อคลิกได้ */
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="container">
      <h1 class="logo">Book a hotel</h1>
      <nav class="nav">
        <ul>
          <li><a href="dashboard.html">Home</a></li>
          <li><a href="history.php?user_id=<?php echo $_SESSION['sess_id']; ?>">History</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="javascript:history.back()">Back</a></li>
          <li><a style="color: #ff5d5d;" href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
</header>

<h1 class="headtx">Booking history</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Tel</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Price</th>
            <th>Room type</th>
            <th>IDroom</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // ตรวจสอบว่า query คืนข้อมูลมาไหม
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // กำหนดสีตามสถานะ
                $statusClass = '';
                $statusContent = $row['status']; // Default status content
                
                // ถ้า status คือ "รอชำระ" ให้เป็นลิงก์ไปยังหน้า payment.php
                if ($row['status'] == 'รอตอบกลับ') {
                    $statusClass = 'status-waiting';
                } elseif ($row['status'] == 'รอชำระ') {
                    $statusClass = 'status-pending';
                    // เพิ่มลิงก์ไปยังหน้า payment.php
                    $statusContent = "<a href='payment.php?booking_id=" . $row['id'] . "'>รอชำระ</a>";
                } elseif ($row['status'] == 'เสร็จสิ้น') {
                    $statusClass = 'status-completed';
                }

                if (empty($row['id_room'])) {
                    $idRoomContent = 'wait confirm';
                } else {
                    $idRoomContent = $row['id_room'];
                }

                echo "<tr>";
                echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['checkin'] . "</td>";
                echo "<td>" . $row['checkout'] . "</td>";
                echo "<td>" . number_format($row['price'], 2) . "</td>";
                echo "<td>" . $row['roomtype'] . "</td>";
                echo "<td>" . $idRoomContent . "</td>";  // ใช้ตัวแปร $idRoomContent
                echo "<td class='$statusClass'>" . $statusContent . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No information found.</td></tr>";
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
