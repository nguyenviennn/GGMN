<?php
session_start();
   include "../connect/connect.php";
   $loi = "";
   $thongbao ="";
   if(isset($_POST["submit"]) && $_POST["username"] != '' && $_POST["password"] != '' ){
    $username = $_POST["username"];
    $password = $_POST["password"];
    // if($username == 'admin' && $password == '1'){
    //     $_SESSION['user'] = 'admin';
    //     header("Location: ../quantri/quantritk.php");
    //   }
    $sql = "SELECT * FROM login WHERE Tai_khoan='$username' AND Mat_khau='$password'";
        $rs = mysqli_query($conn, $sql);
        if(mysqli_num_rows($rs) == 0){
            $loi = "Tài khoản hoặc mật khẩu không đúng !!!";
        }
        while($row = $rs->fetch_assoc()) { 
           $loaitk = $row['Loai_Tk'];
           $xacthuc = $row['xacthuc'];
           if(mysqli_num_rows($rs) > 0 &&  $xacthuc == 0){
            $loi = "Tài khoản chưa được xác thực, vui lòng kiểm tra mail bạn đăng kí!!!";
          }
           if(mysqli_num_rows($rs) > 0 && $loaitk == 1 && $xacthuc == 1){
            $_SESSION['user'] = $row['Ten_TS'];
            header("Location: ../quantri/quantritk.php");
          }
           else if(mysqli_num_rows($rs) > 0 && $xacthuc == 1){
            $_SESSION['user'] = $row['Ten_TS'];
            $_SESSION['id'] = $row['Id'];
            header("Location: ../thituyen/trangchu.php?id=".$_SESSION['id']."");
            }
            if(mysqli_num_rows($rs) > 0 && $loaitk == 3 && $xacthuc == 1){
            $_SESSION['user'] = $row['Ten_TS'];
            $_SESSION['loaitk'] = $row['Loai_Tk'];
            header("Location: ../quantri/quantribt.php");
          }
     }
    }
    if(isset($_SESSION['loii'])){
        $loi = $_SESSION['loii'];
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

    <title>Đăng Nhập</title>

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
                <form action="login.php" method="POST" role="form">
                    <div class="logo">
                    </div>
                    <div class="login-form">
                        <p>Đăng nhập</p>
                      
                        <div>
                            <p>Tài khoản:</p>
                            <input class="input" type="username" name="username" id="phone"
                                placeholder="Nhập số điện thoại">
                            <span class="check-phone"></span>
                            
                        </div>
                        <div>
                        <br>
                            <p>Mật khẩu:</p>
                            <input  class="input" type="password" name="password" id="password"
                                placeholder="Nhập mật khẩu">
                            <span class="check-password"></span>
                        </div>
                     
                    </div>
                    <!-- <div class="remember">
                            <input type="checkbox" name="remember" id="">
                            <label for="forgot">Remember me</label>
                        </div>  
                        <?php
                            if(isset($_POST['submit']) && $_POST['submit'])
                        ?> -->
                    <div class="btn-login">
                        <button type="submit" name="submit" id="btn-login">Đăng nhập</button>
                    </div>
                    <div class="forgot-password">
                        <a href="../creatacc/updatekey.php">Đổi mật khẩu </a><span>|</span>
                        <a href="../creatacc/creatacc.php">Đăng kí</a>
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