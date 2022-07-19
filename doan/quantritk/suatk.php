<?php
 session_start();
 // var_dump($_SESSION["user"]);
 if (!isset($_SESSION["user"])) {
     header("Location: ../login/login.php");
 };
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    $loi = "";
    $thongbao ="";
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $sql = "SELECT * FROM login WHERE Id = '$id'";
        $rs =  mysqli_query($conn,$sql);
        $rows = mysqli_fetch_array($rs);

        $loi = "";
         $thongbao ="";
    if(isset($_POST["submit"])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $loai = $_POST['loaitk'];
        
        $sql = "SELECT * FROM login WHERE Tai_khoan = '$username'" ;
        $old = mysqli_query($conn, $sql);
       
        if( mysqli_num_rows($old) > 0){
            $loi = "Tài khoản đã tồn tại!!!";
        }
        if($username == '' && $password == '' && $name == '' && $loai == ''){
            $loi = "Chưa nhập đủ thông tin !!!";
        }
        else{
                $sql = "UPDATE login SET Tai_khoan='$username',Ten_TS='$name',Mat_khau='$password',Loai_Tk='$loai' WHERE Id = $id";
                mysqli_query($conn, $sql);
                // $thongbao = " Đã đổi mật khẩu thành công !!!";
                header("location: ../quantri/quantritk.php");
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

    <title>Sửa tài khoản</title>

    <link rel="stylesheet" href="../login/login.css">
</head>
<style>
    body { 
        background-image: url(https://t3.ftcdn.net/jpg/03/55/60/70/360_F_355607062_zYMS8jaz4SfoykpWz5oViRVKL32IabTP.jpg)
    }
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
<body style="
    display: flex;
    justify-content: center;
    align-items: center;
    
">
    <div class="form-login-right">
        <form action="../quantritk/suatk.php?id=<?php echo $rows['Id']; ?>" method="POST" role="form">
            <div class="logo">
            </div>
            <div class="login-form">
                <p>Sửa tài khoản</p>
                <div>
                    <p>Tên đăng nhập:</p>
                    <input class="input" class="input" type="name" name="name" id="name" placeholder="Tên đăng nhập" value="<?php echo $rows['Ten_TS'];?>">
                    <span class="check-phone"></span>

                </div>
                <div>
                    <p>Tài khoản:</p>
                    <input class="input" type="username" name="username" id="phone" placeholder="Nhập tài khoản"  value="<?php echo $rows['Tai_khoan'];?>">
                    <span class="check-phone"></span>

                </div>
                <div>
                    <br>
                    <p>Mật khẩu:</p>
                    <input class="input" type="text" name="password" id="password" placeholder="Nhập mật khẩu"  value="<?php echo $rows['Mat_khau'];?>">
                    <span class="check-password"></span>
                </div>
                <div>
                    <br>
                    <p>Loại tài khoản:</p>
                    <input class="input" class="input" type="text" name="loaitk" id="password" value="<?php echo $rows['Loai_Tk'];?>">
                    <span class="check-password"></span>
                </div>
            </div>
            <div class="btn-login">
                <button type="submit" name="submit" id="btn-login">Sửa </button>
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
    <a href="../quantri/quantritk.php" style="margin-left:30px; ">Quay lại</a>

    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<!-- <script src="../login/login.js"> -->

</script>

</html>