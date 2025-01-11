<?php
    include "../connect.php";

    $sql = "SELECT * FROM tb_user WHERE 
    username = '" . $_POST['username']."' AND
    password = '" . $_POST['password']."' ";

    $query = $conn->query($sql);
    $num = $query->num_rows;

    if ($num > 0) {
        session_start();
        // ใช้ fetch_assoc() แทน fetch_object()
        $result = $query->fetch_assoc();

        // ตรวจสอบว่า 'user_id' อยู่ในผลลัพธ์ที่ได้จากฐานข้อมูลหรือไม่
        if (isset($result['user_id'])) {
            $_SESSION['sess_id'] = $result['user_id'];  // ใช้ $result['user_id'] สำหรับอาร์เรย์
            $_SESSION['sess_username'] = $_POST['username'];
            echo "<script>
                    alert('Login successful!');
                    window.location.href = '../dashboard.php';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('ไม่พบ ID ของผู้ใช้งาน!');
                    window.history.back();
                  </script>";
            exit;
        }
        
    } else {
        echo "<script>
                alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
                window.history.back();
              </script>";
        exit;
    }
?>
