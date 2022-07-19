<?php
    session_start();
    // var_dump($_SESSION["user"]);
    if (!isset($_SESSION["user"])) {
        header("Location: ../login/login.php");
    };
    // echo $_SESSION['id'];
    // echo htmlspecialchars($_SERVER["PHP_SELF"]); 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    $idTK=$_GET['id'];

    $sql = "SELECT Bai_Thi
    FROM baithi
    WHERE Id=$idTK";
    $rs = mysqli_query($conn, $sql);
    $sql_tt = "SELECT Hinh_XacThuc
    FROM xacthuc
    WHERE Id=$idTK";
    $rs_one = mysqli_query($conn, $sql_tt);
    $thongbao = "";
    if(isset($_POST['submit']) && $_POST['xacthuc'] != '') {
           $xacthuc = (isset($_POST['xacthuc']))? $_POST['xacthuc'] :"";
           include "../connect/connect.php";
           $sql_query = "UPDATE login SET Duyet='$xacthuc' WHERE Id = $idTK";
           mysqli_query($conn,$sql_query);
           if(isset($_POST['submit']) && $_POST['xacthuc'] == 'Thông tin chính xác') {
            $sql = "SELECT *
            FROM hoso
            WHERE Id=$idTK";
            $rs =  mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($rs);
            $_SESSION['eml'] = $rows['Email'];
            include "../mail/sendmailxt.php";
           }
           if(isset($_POST['submit']) && $_POST['xacthuc'] == 'Sai thông tin cá nhân') {
            $sql = "SELECT *
            FROM hoso
            WHERE Id=$idTK";
            $rs =  mysqli_query($conn,$sql);
            $rows = mysqli_fetch_array($rs);
            $_SESSION['eml'] = $rows['Email'];
            include "../mail/sendmailxts.php";
           }
           
           header("Location: ../quantri/quantritk.php");
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
        border: 1px solid black;
        background-color: #ccc;
        color: black;
        padding: 8px;
    }

    .btn:hover {
        background-color: #0984e3;
        color: white;
    }
    .box1{
    width: 30%;
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
                  <p><i class="fa-solid fa-pen-clip"></i> Điểm chuẩn, thời gian nộp bài</p>
            </a>
        </div>
        <div class="admin-control">
            <div class="box1">
            </div>
            <div class="box2">
                <div class="title">
                    <h4>Xác thực thông tin cá nhân của thí sinh</h4>
                </div>
                <div class="table" style="display:contents;">
                    <table>
                        <tr>
                            <th>Hình ảnh thông tin cá nhân của thí sinh</th>
                        </tr>
                        <?php   
                        while($rows = mysqli_fetch_array($rs_one)){ ?>
          
                            <td><img style="width:70%" src="<?php echo $rows['Hinh_XacThuc']?>" alt=""></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <br>
                </div>
                <label class="gioi-tinh" for="fgioitinh">Xác thực thông tin cá nhân của thí sinh: </label>
                <form action="quantrihsts.php?id=<?php echo $idTK?>" method="post" enctype="multipart/form">
               
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" name= "xacthuc" value="Thông tin chính xác">
                            <label class="form-check-label" for="inlineCheckbox1" name="xacthuc">Thông tin chính xác</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2" name="xacthuc" value="Sai thông tin cá nhân" checked="checked">
                            <label class="form-check-label" for="inlineCheckbox2" name="xacthuc">Thông tin sai lệch</label>
                        </div>
                        <label for=""><button class="btn" type="submit" name="submit">Xác thực</button></label>
                     </form>
                     <a href="../quantri/quantrihs.php">Quay lại</a>
            </div>
            <div class="box3">
                
            </div>
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