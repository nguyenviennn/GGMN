<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    session_start();
    // var_dump($_SESSION["user"]);
    if (!isset($_SESSION["user"])) {
        header("Location: ../login/login.php");
    };
    $loi = "";
    $thongbao ="";
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $sql = "SELECT * FROM phongthi WHERE Id_Phong = '$id'";
        $rs =  mysqli_query($conn,$sql);
        $rows = mysqli_fetch_array($rs);

        $loi = "";
         $thongbao ="";
    if(isset($_POST["submit"])){
        $dothi = $_POST['dothi'];
        $kithi = $_POST['kithi'];
      
        if($namts == '' && $dothi == '' && $kithi == ''){
            $loi = "Chưa nhập đủ thông tin !!!";
        }
        else{
                $sql = "UPDATE phongthi SET Doi_Thi = $dothi,Ki_Thi = '$kithi' WHERE Id_Phong = $id";
                mysqli_query($conn, $sql);
                // $thongbao = " Đã đổi mật khẩu thành công !!!";
                header("location: ../quantri/quantript.php");
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
        <form action="../quantript/suapt.php?id=<?php echo $rows['Id_Phong']; ?>" method="POST" role="form">
            <div class="logo">
            </div>
            <div class="login-form">
                <p>Sửa Phòng Thi</p>
                <div>
                    <p>Đợt thi:</p>
                    <input class="input" class="input" type="name" name="dothi" id="name" placeholder="" value="<?php echo $rows['Doi_Thi'];?>">
                    <span class="check-phone"></span>

                </div>
                <div>
                    <p>Kì thi:</p>
                    <input class="input" type="username" name="kithi" id="kithi" placeholder=""  value="<?php echo $rows['Ki_Thi'];?>">
                    <span class="check-phone"></span>

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