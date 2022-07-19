<?php
    session_start();
    // var_dump($_SESSION["user"]);
    if (!isset($_SESSION["user"])) {
        header("Location: ../login/login.php");
    };
    if (isset($_SESSION["loaitk"])) {
        $_SESSION['phanquyen'] = "<script>alert('Bạn không đủ quyển truy cập !');</script>";
        header("Location: ../quantri/quantribt.php");
    };
    // echo $_SESSION['id'];
    // echo htmlspecialchars($_SERVER["PHP_SELF"]); 
    $uploadOk =1;
    if(isset($_POST['submit']) && $uploadOk != 0){
    if(isset($_POST['submit']) && $_POST['diemchuan'] != '') {
        $diemchuan = (isset($_POST['diemchuan']))? $_POST['diemchuan'] :"";
        $ngaythi = (isset($_POST['ngaythi']))? $_POST['ngaythi'] :"";
        include "../connect/connect.php";
        $sql_query = "UPDATE diemchuan SET Diem_Chuan=$diemchuan,Ngay_Thi ='$ngaythi' WHERE Id_diem = 1";
        mysqli_query($conn,$sql_query);
        header("Location: diemchuan.php");
 }
};
//         $id = $_SESSION['id'];
//         // echo htmlspecialchars($_SERVER["PHP_SELF"]);
//         include "../connect/connect.php";
//         $cc="SELECT * FROM login WHERE Id = '$id'";
//         global $conn;
//         $x=mysqli_query($conn, $cc);
//         while($row = $x->fetch_assoc()) { 
//             if($id == $row['Id']){
//                 $thongbao = "Tài khoản đã đăng kí hồ sơ, vui lòng kiểm tra lại !!!";
//                 $_SESSION['disabled'] = 'disabled=""';
//             }          
//  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Arvo&family=Quicksand:wght@300&family=Roboto:wght@100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../quantri/quantri.css">
    <link rel="stylesheet" href="../thituyen/footer.css">
    <link rel="stylesheet" href="../thituyen/menu.css">

    <title>Trang Admin</title>
</head>
<style>
    input {
        padding: 8px;
        border-radius: 5px;
        border: 1px solid;
    }

    .btn {
        background-color: #ccc;
        color: black;
        padding: 8px;
        transition: all 0.35s;
    }

    .btn:hover {
        background-color: #dd8f22 ;
        color: white;
        transition: all 0.35s;
    }
    .diemchuan{
    margin-left: 260px;
    padding-top: 15px;
    }
    .admin{
        margin-top:120px;
    }
</style>

<body>
    <header>
        <div class="container">
            <div class="menu-top">
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="logo">
                    <img id="logo" src="https://tuyensinh.dhsphue.edu.vn/Upload/logo/12_52_28_04_24_32_mam_non.png"
                        alt="">
                </div>
                <div class="search">
                    <input type="text" name="tukhoa" id="search" placeholder="Tìm kiếm">
                    <button type="submit" name="timkiem"> <i class="fas fa-search"></i></button>
                </div>
                <nav>
                    <ul class="list-menu">
                        <li><a href="../thituyen/trangchu.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="fas fa-home"></i> Trang chủ</a></li>
                        <li><a href="../dangkihoso/dangkihoso.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="fas fa-address-card"></i> Đăng kí hồ sơ</a></li>
                        <li><a href="../tintuc/tintuc.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="far fa-newspaper"></i> Tin tức</a></li>
                        <li><a href="../lienhe/lienhe.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="fas fa-envelope"></i> Liên hệ</a></li>
                        <li><a href="../thongke/thongke.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="fas fa-info-circle"></i> Thống kê</a></li>
                    </ul>
                </nav>
                <div class="box-user">
                    <p><i class="fas fa-user"></i>
                        <?php 
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "test";
                    // Create connection
                    $conn = new mysqli($servername, $username, $password,$dbname);
                    $thongbao = "";
                    $sql = "SELECT *
                    FROM diemchuan";
                    $rs = mysqli_query($conn, $sql);
                    $rows = mysqli_fetch_array($rs);
                   
                        echo $_SESSION["user"];

                    ?>
                        <i class="fas fa-chevron-down"></i></p>

                    <div class="box-login">
                        <p><a href="../creatacc/updatekey.php">Đổi mật khẩu</a></p>
                        <p><a href="../login/logout.php">Đăng xuất</a></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="admin">
        <div class="admin-list">
            <h4><i class="fas fa-home"></i>Trang chủ Admin</h4>
            <a href="../quantri/quantritk.php">
                <p><i class="fa-solid fa-user-large"></i> Quản lý tài khoản</p>
            </a><a href="quantrihs.php">
                <p><i class="fa-solid fa-users"></i> Quản lý hồ sơ</p>
            </a>
            <a href="../quantri/quantript.php">
                <p><i class="fa-solid fa-house-chimney-user"></i> Quản lý phòng thi</p>
            </a>
            <a href="../quantri/quantritt.php">
                <p><i class="fa-solid fa-newspaper"></i> Quản lý tin tức</p>
            </a>
            <a href="../quantri/quantribt.php">
                <p><i class="fa-solid fa-file-lines"></i> Quản lý bài thi</p>
            </a>
            <a href="../quantri/quantrich.php">
                <p><i class="fa-solid fa-circle-exclamation"></i> Giải Đáp Thắc Mắc</p>
            </a>
            <a href="diemchuan.php">
                  <p><i class="fa-solid fa-pen-clip"></i>Điểm chuẩn, thời gian nộp bài</p>
            </a>
        </div>
        <div class="diemchuan">
            <form action="diemchuan.php" method="post" enctype="multipart/form">
                <input type="text" name="diemchuan" placeholder="Nhập điểm chuẩn" value="<?php echo $rows['Diem_Chuan'] ?>" required>
                <input type="date" name="ngaythi" placeholder="Nhập ngày thi" value="<?php echo $rows['Ngay_Thi'] ?>">
                <?php if(isset($_POST['diemchuan']) && $diemchuan != ""){
                    $uploadOk = 1;
                            if (!preg_match ("/^[0-9]*$/",$diemchuan)){  
                                $uploadOk = 0;
                                echo '<div style="color:red;">Vui lòng nhập số diểm !!!</div>';
                            };
                         } ?>
                <label for=""><button class="btn" type="submit" name="submit">Xác Nhận</button></label>
            </form>
            <p>Điểm chuẩn hiện tại là: <?php echo $rows['Diem_Chuan']?></p>
            <p>Ngày nộp bài thi là: <td><?php echo date("d/m/Y",strtotime($rows['Ngay_Thi'])); ?></td></p>
        </div>
    </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="../thituyen/thituyenmn.js"></script>

</html>