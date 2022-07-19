<?php
session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    $loi = "";
    $thongbao ="";
    if(isset($_POST["submit"]) && $_POST["username"] != '' && $_POST["password"] != '' && $_POST["repassword"] != ''){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $name = $_POST["name"];
        $emaill = $_POST["email"];
if($_POST["username"] == '' || $_POST["password"] == '' || $_POST["repassword"] == '' || $_POST["email"] == '' || $_POST["name"] == ''){
    $loi = "Không được bỏ trống !";}
       else if($password != $repassword){
            $loi = "Mật khẩu không khớp !";    
        }
        else if(strlen($password) < 6){
            $loi = "Mật khẩu chứa ít nhất 6 kí tự !!!";
        }else{
            $sql = "SELECT * FROM login WHERE Tai_khoan = '$username'" ;
            $old = mysqli_query($conn, $sql);
           
            if( mysqli_num_rows($old) > 0){
                $loi = "Tài khoản đã tồn tại!!!";
            }
            if($loi = ""){ 
            }
            else{
                $_SESSION['email'] = $emaill;
                $_SESSION['name'] = $username;
                $_SESSION['noidung'] = 'Bạn đã đăng kí thành công, vui lòng ấn <a style="font-size:14px;text-decoration:none" href="http://localhost:81/web/doan/login/xacminhtk.php?name='.$username.'&target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://localhost:81/web/doan/login/xacminhtk.php?name='.$username.'&source=gmail&amp;ust=1654480180099000&amp;usg=AOvVaw1VHkNfN-OP7Sa3JMyEBTDC">Xác minh tài khoản</a>';
                $sql = "INSERT INTO login(Tai_khoan,Mat_khau,Ten_TS,Emaill) VALUES ('$username', '$password','$name','$emaill')";
                mysqli_query($conn, $sql);
                include "../mail/sendmail.php";
                $thongbao = "Đã đăng kí thành công!!!";
                unset($_SESSION['loii']);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Đăng kí tài khoản</title>

    <link rel="stylesheet" href="../login/login.css">
</head>
<style>
    .login-form p {
        color: #000;
    }

    .btn-login button {
        background-color: #000;
        opacity: 0.8;
    }

    .btn-login button:hover {
        opacity: 1;
    }
</style>

<body>
    <div class="web">
        <div class="form-login">
            <div class="form-login-left">
            </div>

            <div class="form-login-right">
                <form action="creatacc.php" method="POST" role="form">
                    <div class="logo">
                    </div>
                    <div class="login-form">
                        <p>Đăng ký</p>
                        <div>
                            <p>Tên đăng nhập:</p>
                            <input class="input" class="input" type="name" name="name" id="name"
                                placeholder="Tên đăng nhập">
                            <span class="check-phone"></span>
                        </div>
                        <div>
                            <p>Tài khoản:</p>
                            <input class="input" type="username" name="username" id="phone"
                                placeholder="Nhập tên tài khoản">
                            <span class="check-phone"></span>
                        </div>
                        <div>
                            <p>Email:</p>
                            <input class="input" type="text" name="email" id="phone" placeholder="Nhập Email">
                            <span class="check-phone"></span>
                        </div>
                        <div>
                            <p>Mật khẩu:</p>
                            <input class="input" type="password" name="password" id="password"
                                placeholder="Nhập mật khẩu">
                            <span class="check-password"></span>
                        </div>
                        <div>
                            <br>
                            <p>Nhập lại mật khẩu:</p>
                            <input class="input" class="input" type="password" name="repassword" id="password"
                                placeholder="Nhập lại mật khẩu">
                            <span class="check-password"></span>
                        </div>
                    </div>
                    <div class="btn-login">
                        <button type="submit" name="submit" id="btn-login">Đăng Ký</button>
                    </div>
                    <div class="forgot-password">
                        <a href="updatekey.php">Đổi mật khẩu </a><span>|</span>
                        <a href="../login/login.php">Đăng nhập</a>
                    </div>
                    <div>
                        <?php 
                        if($loi != ""){ ?>
                        <div style="color: red;"><?php echo $loi; ?></div>
                        <?php }
                        if($thongbao != ""){ ?>
                        <div style="color: blue;"><?php echo $thongbao; ?></div>
                        <?php } ?>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<!-- <script src="../login/login.js"> -->

</script>

</html>