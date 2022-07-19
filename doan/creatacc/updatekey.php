<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    $loi = "";
    $thongbao ="";
    if(isset($_POST["submit"])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if($username == '' && $password == '' && $password1 == '' && $password2 == ''){
            $loi = "Chưa nhập đủ thông tin !!!";
        }
        else{
            $sql = "SELECT * FROM login WHERE Tai_khoan='$username' AND Mat_khau='$password'";
            $old = mysqli_query($conn, $sql);
        
            if( mysqli_num_rows($old) > 0 && $password1 == $password2){
                $sql = "UPDATE login SET Mat_khau='$password1' WHERE Tai_khoan='$username'";
                mysqli_query($conn, $sql);
                $thongbao = " Đã đổi mật khẩu thành công !!!";
            }
            else{
                $loi ="Mật khẩu không khớp!!!";
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

    <title>Đổi mật khẩu</title>

    <link rel="stylesheet" href="../login/login.css">
</head>
<style>
      .login-form p {
        color: #000;
    }
    .btn-login button{
       background-color: #000;
       opacity: 0.8;
    }
    .btn-login button:hover{
        opacity: 1;
    }
</style>
<body>
    <div class="web">
        <div class="form-login">
            <div class="form-login-left">
            </div>

            <div class="form-login-right">
                <form action="updatekey.php" method="POST" role="form">
                    <div class="logo">
                    </div>
                    <div class="login-form">
                        <p>Đổi mật khẩu</p>
                        <div>
                            <p>Tên tài khoản:</p>
                            <input class="input" class="input" type="username" name="username" id="phone"
                                placeholder="Nhập tài khoản">
                            <span class="check-phone"></span>
                            
                        </div>
                        <div>
                        <br>
                            <p>Mật khẩu cũ:</p>
                            <input class="input" class="input" type="password" name="password" id="password"
                                placeholder="Nhập mật khẩu">
                            <span class="check-password"></span>
                        </div>
                        <div> 
                        <br>
                            <p>Nhập khẩu mới:</p>
                            <input class="input" class="input" type="password" name="password1" id="password"
                                placeholder="Nhập mật khẩu mới">
                            <span class="check-password"></span>
                        </div>
                        <div> 
                        <br>
                            <p>Nhập lại khẩu mới:</p>
                            <input class="input" class="input" type="password" name="password2" id="password1"
                                placeholder="Nhập lại mật khẩu mới">
                            <span class="check-password"></span>
                        </div>
                    </div>
                    <div class="btn-login">
                        <button type="submit" name="submit" id="btn-login">Xác nhận</button>
                    </div>
                    <div class="forgot-password">
                        <a href="creatacc.php">Đăng kí </a><span>|</span>
                        <a href="../login/login.php">Đăng nhập</a>
                    </div>
                        <?php if( $loi != ""){ ?>
                            <div class="error" style="color :red;"> <p><?php echo $loi; ?></p>
                        </div>
                        <?php } ?>
                        <?php if( $thongbao != ""){ ?>
                            <div class="error" style="color :bule;"> <p><?php echo $thongbao; ?></p> </div>
                        <?php } ?>
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