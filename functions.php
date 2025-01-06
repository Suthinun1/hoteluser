<?php
define('DB_SEVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_project');

class DB_con {
    function __construct() {
        $conn = mysqli_connect(DB_SEVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to Mysqli : " . mysqli_connect_error();
        }
    }

    // Insert a new user with email
    public function insert($username, $password, $firstname, $lastname, $email) {
        $result = mysqli_query($this->dbcon, 
            "INSERT INTO tb_user (username, password, firstname, lastname, email) 
             VALUES ('$username', '$password', '$firstname', '$lastname', '$email')"
        );
        return $result;
    }

    // Fetch all user data
    public function fetchdata() {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_user");
        return $result;
    }

    // Fetch a single user record by ID
    public function fetchonerecord($userid) {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_user WHERE id = '$userid'");
        return $result;
    }

    // Update user data, including email
    public function update($username, $password, $firstname, $lastname, $email, $userid) {
        $result = mysqli_query($this->dbcon,  
            "UPDATE tb_user SET 
             username = '$username',
             password = '$password',  
             firstname = '$firstname',
             lastname = '$lastname',
             email = '$email' 
             WHERE id = '$userid'"
        );
        return $result;
    }

    // Delete a user record by ID
    public function delete($userid) {
        $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tb_user WHERE id='$userid'");
        return $deleterecord;
    }

    public function checkUserEmail($username, $email) {
        $query = "SELECT * FROM tb_user WHERE username = '$username' AND email = '$email'";
        $result = mysqli_query($this->dbcon, $query);
        return $result;
    }
    
    public function resetPassword($username, $new_password) {
        // ไม่มีการแฮชรหัสผ่าน แค่เก็บรหัสผ่านเป็นข้อความธรรมดา
        $query = "UPDATE tb_user SET password = '$new_password' WHERE username = '$username'";
        $result = mysqli_query($this->dbcon, $query);
        return $result;
    }     
        
}
?>
