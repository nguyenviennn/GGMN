<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$name = $_GET['name'];
$Sql = "UPDATE login SET xacthuc = 1 WHERE Tai_Khoan = '$name'";
mysqli_query($conn, $Sql);
echo "Bạn đã xác thực tài khoản thành công !";
?>
<div>
   <a href="../login/login.php">Ấn vào đây để đăng nhập</a>
</div>
