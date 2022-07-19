<?php
    session_start();
    // var_dump($_SESSION["user"]);
    if (!isset($_SESSION["user"])) {
        header("Location: ../login/login.php");
    };
    // echo $_SESSION['user'];
    // echo htmlspecialchars($_SERVER["PHP_SELF"]);
    $tukhoa = (isset($_POST["tukhoa"])) ? $_POST["tukhoa"]:"";
    if (isset($_SESSION["loaitk"])) {
        $_SESSION['phanquyen'] = "<script>alert('Bạn không đủ quyển truy cập !');</script>";
        header("Location: ../quantri/quantribt.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Arvo&family=Quicksand:wght@300&family=Roboto:wght@100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="quantri.css">
    <link rel="stylesheet" href="../thituyen/footer.css">
    <link rel="stylesheet" href="../thituyen/menu.css">

    <title>Thi năng khiếu ngành Giáo dục mầm non</title>
</head>
<style>
    .table th {
        padding: 0.2rem;
    }
    .nextpage {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px 0;
    }

    .nextpage li {
        list-style: none;
    }

    .nextpage a {
        padding: 5px 10px;
        text-decoration: none;
        margin: 0 10px;
        border: 1px solid #ccc;
        color: #121212;
    }

    strong {
        padding: 5px 10px;
        text-decoration: none;
        margin: 0 10px;
        border: 1px solid #ccc;
        color: #fff;
        background-color: #dd8f22;
    }

    .nextpage a:hover {
        background-color: #dd8f22;
    }
    .box1{
    width: 30%;
}
</style>

<body>
    <header>
        <form action="../quantri/quantrihs.php" method="post">

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
                        <input type="text" name="tukhoa" id="search" placeholder="Tìm kiếm hồ sơ">
                        <button type="submit" name="timkiem"> <i class="fas fa-search"></i></button>
                    </div>
                    <nav>
                        <ul class="list-menu">
                            <li><a href="#"><i class="fas fa-home"></i> Trang chủ</a></li>
                            <li><a href="#"><i class="fas fa-address-card"></i> Đăng kí hồ sơ</a></li>
                            <li><a href="#"><i class="far fa-newspaper"></i> Tin tức</a></li>
                            <li><a href="#"><i class="fas fa-envelope"></i> Liên hệ</a></li>
                            <li><a href="#"><i class="fas fa-info-circle"></i> Thống kê</a></li>
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
                    // $idTK=$_GET['id'];
                    $soluong = !empty($_GET['soluong'])?$_GET['soluong']:3;
                    $vitri = !empty($_GET['vitri'])?$_GET['vitri']:1;
                    $vitritrongtrang = ($vitri - 1) * $soluong;
                    if(isset($_POST['tukhoa']) && $_POST['tukhoa'] != ''){
                        $sql = "SELECT * FROM hoso WHERE Id LIKE '%".$tukhoa."%'";
                        $rs = mysqli_query($conn, $sql);
                  }
                else{
                    $sql = "SELECT * FROM hoso LIMIT $soluong OFFSET $vitritrongtrang ";
                    $rs = mysqli_query($conn, $sql);
                  
                }
              
                $sqll = "SELECT * FROM hoso";
                $tong = mysqli_query($conn, $sqll);
               $tongtk = mysqli_num_rows($tong);
               $sotrang = ceil($tongtk / $soluong);
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
        </form>

    </header>
    <section class="admin">
        <div class="admin-list">
            <h4><i class="fas fa-home"></i> Trang chủ Admin</h4>

            <a href="quantritk.php">
                <p><i class="fa-solid fa-user-large"></i> Quản lý tài khoản</p>
            </a><a href="quantrihs.php">
                <p><i class="fa-solid fa-users"></i> Quản lý hồ sơ</p>
            </a>
            <a href="quantript.php">
                <p><i class="fa-solid fa-house-chimney-user"></i> Quản lý phòng thi</p>
            </a>
            <a href="quantritt.php">
                <p><i class="fa-solid fa-newspaper"></i> Quản lý tin tức</p>
            </a>
            <a href="quantribt.php">
                <div>
                    <p><i class="fa-solid fa-file-lines"></i> Quản lý bài thi</p>
                </div>
            </a>
            <a href="quantrich.php">
                <p><i class="fa-solid fa-circle-exclamation"></i> Giải Đáp Thắc Mắc</p>
            </a>
            <a href="diemchuan.php">
                <p><i class="fa-solid fa-pen-clip"></i>Điểm chuẩn, thời gian nộp bài</p>
            </a>
        </div>
        <div class="admin-control">
            <div class="box1">

            </div>
            <div class="box2">
                <div class="title">
                    <h4>QUẢN LÝ HỒ SƠ THÍ SINH</h4>
                </div>
                <div class="table">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Hồ sơ</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Căn Cước</th>
                            <th>Ảnh</th>
                            <th>Ưu Tiên</th>
                            <th>Khu vực</th>
                            <th>Đợi thi</th>
                            <th>Điểm xét tuyển môn Toán</th>
                            <th>Điểm xét tuyển môn Văn</th>
                            <th colspan="2">Quản lý</th>
                        </tr>
                        <?php
                        $i= 1;
                        while($rows = mysqli_fetch_array($rs)){ ?>
                        <tr>
                            <td><?php echo $vitritrongtrang++; ?></td>
                            <td><?php echo $rows['Id']; ?></td>
                            <td><a
                                    href="../quantri/quantrihsts.php?id=<?php echo $rows['Id']; ?>"><?php echo $rows['Ho_Ten']; ?></a>
                            </td>
                            <td><?php echo date("d/m/Y",strtotime($rows['Ngay_Sinh'])); ?></td>
                            <td><?php echo $rows['Gioi_Tinh']; ?></td>
                            <td><?php echo $rows['Email']; ?></td>
                            <td><?php echo $rows['Dia_Chi']; ?></td>
                            <td><?php echo $rows['SDT']; ?></td>
                            <td><?php echo $rows['CCCD']; ?></td>
                            <td class="file-img"><img src="<?php echo $rows['Anh'];?>" alt=""></td>
                            <td><?php echo $rows['Uu_Tien']; ?></td>
                            <td><?php echo $rows['Khu_Vuc']; ?></td>
                            <td><?php echo $rows['Dot_Thi']; ?></td>
                            <td><?php echo $rows['Diemxt']; ?></td>
                            <td><?php echo $rows['Diem_Van']; ?></td>
                            <td class="fix"><a href="../quantrihs/suahs.php?id=<?php echo $rows['Id']; ?>"><i
                                        class="fa-solid fa-wrench"></i></a></td>
                            <td class="delete"><a href="../quantrihs/xoahs.php?id=<?php echo $rows['Id']; ?>"
                                    onclick="return confirm('Bạn thực sự muốn xóa !!!')"><i
                                        class="fa-solid fa-xmark"></i></a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="nextpage">
                    <ul class="nextpage">
                        <?php if($vitri >3){
                            $trangmot =1 ;?>
                        <li><a href="?soluong=<?=$soluong?>&vitri=<?=$trangmot?>">First</a></li>
                        <?php } ?>
                        <?php if($vitri > 1 ){
                            $quaylai = $vitri - 1 ;?>
                        <li><a href="?soluong=<?=$soluong?>&vitri=<?=$quaylai?>">Prev</a></li>
                        <?php } ?>
                        <?php for($num = 1 ;$num <= $sotrang;$num++){ ?>
                        <?php if($num != $vitri){ ?>
                        <?php if($num > $vitri - 3 && $num < $vitri +3){ ?>
                        <li><a href="?soluong=<?=$soluong?>&vitri=<?=$num?>"><?=$num?></a></li>
                        <?php }?>
                        <?php }else{ ?>
                        <strong><?=$num?></strong>
                        <?php }?>
                        <?php }?>
                        <?php if($vitri < $sotrang){
                            $tienlen = $vitri + 1 ;?>
                        <li><a href="?soluong=<?=$soluong?>&vitri=<?=$tienlen?>">Next</a></li>
                        <?php } ?>
                        <?php if($vitri < $sotrang - 2){
                            $trangcuoi = $sotrang ;?>
                        <li><a href="?soluong=<?=$soluong?>&vitri=<?=$trangcuoi?>">Last</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="wrapper">
        <div class="ring">
            <div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show">
                <div class="coccoc-alo-ph-circle"></div>
                <div class="coccoc-alo-ph-circle-fill"></div>
                <div class="coccoc-alo-ph-img-circle"></div>
            </div>
        </div>
    </div>
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