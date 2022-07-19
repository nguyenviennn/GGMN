<?php
 session_start();
 // var_dump($_SESSION["user"]);
 if (!isset($_SESSION["user"])) {
     header("Location: ../login/login.php");
 };
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

    <title>Thêm tin tức</title>

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
<body>
    <div style="
    display: flex;
    justify-content: center;
    align-items: center;
">
            <div class="form-login-right">
                <form action="themtt1.php" method="POST" enctype="multipart/form-data"
                 role="form">
                    <div class="logo">
                    </div>
                    <div class="login-form">
                        <p>Thêm tin tức</p>
                        <div>
                            <p>Tên tin tức:</p>
                            <input class="input" class="input" type="name" name="tentt" id="name"
                                placeholder="Nhập tên tin">
                            <span class="check-phone"></span>
                            
                        </div>
                        <div>
                            <p>Thời gian:</p>
                            <input class="input" type="date" name="thoigian" id="phone"
                                placeholder="Thời gian đăng tin">
                            <span class="check-phone"></span>
                            
                        </div>
                        <div>
                            <p>Hình ảnh tin:</p>
                            <input type="file" name="anh" id="">
                        </div>
                        <div>
                        <br>
                            <p>Nôi dung tin:</p>
                            <textarea class="input" name="ndtin" id="" cols="30" rows="10" placeholder="Nhập nội dung tin"></textarea>
                        </div>
                    </div>
                    <div class="btn-login">
                        <button type="submit" name="submit" id="btn-login">Thêm </button>
                    </div>
                </form>
            <a href="../quantri/quantritt.php" style="margin-left:30px; ">Quay lại</a>

            </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<!-- <script src="../login/login.js"> -->
</script>

</html>