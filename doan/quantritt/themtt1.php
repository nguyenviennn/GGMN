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

    $target_dir = "imgtintuc/";
    $target_file = $target_dir . basename($_FILES["anh"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["anh"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $loianh = "Không phải ảnh !!!";
        $uploadOk = 0;
    }
    }
    if ($_FILES["anh"]["size"] > 5000000) {
    $loianh = "Kích thước quá lớn !!!";
    $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {

    $uploadOk = 0;
    }
    if ($uploadOk == 0) {
    $loianh = "Không thể tải file !!!";
    } else {
    if (move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
    } 
    }
    $duongdanfile = "http://localhost:81/web/doan/quantritt/imgtintuc/" .htmlspecialchars( basename( $_FILES["anh"]["name"]));
    
    if(isset($_POST["submit"]) && $_POST["ndtin"] != '' && $_POST["thoigian"] != '' && $_POST["tentt"] != ''){
        $loi = "";
        $thongbao ="";
        $tentin = $_POST["tentt"];
        $thoigian = $_POST["thoigian"];
        $ndtin = $_POST["ndtin"];
            $sql = "SELECT * FROM tintuc WHERE Ten_Tin = '$tentin'" ;
            $old = mysqli_query($conn, $sql);
           
            if( mysqli_num_rows($old) > 0){
                $loi = "Tin tức đã có trên trang rồi không thể sửa !!!";
            }
            else{
                echo $duongdanfile;
                $sql = "INSERT INTO tintuc(Ten_Tin,Hinh_Anh,Thoi_Gan,Nd_Tin) VALUES ('$tentin','$duongdanfile','$thoigian','$ndtin')";
                mysqli_query($conn, $sql);
                $thongbao = "Đã thêm thành công!!!";
                header("location: ../quantri/quantritt.php");
            }
    }
    else{
        $loi = "Vui lòng nhập thông tin thông tin !!!";
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
                    <div>
                        <?php 
                        if($loi != ""){ ?>
                             <div style="color: red;"><?php echo $loi; ?></div>
                        <?php }
                       ?>
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