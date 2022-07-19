<?php
    session_start();
    // var_dump($_SESSION["user"]);
    // if (!isset($_SESSION["user"])) {
    //     header("Location: ../login/login.php");
    // };
    $_SESSION["id"] = $_GET['id'];
    include "../connect/connect.php";
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    date_default_timezone_get();
    $time_now = getdate();
    $show_date = $time_now["year"]; 
    $tukhoa = (isset($_POST["tukhoa"])) ? $_POST["tukhoa"]:"";
    $_SESSION["id"] = $_GET['id'];
    $id = $_SESSION['id'];
    $soluong = !empty($_GET['soluong'])?$_GET['soluong']:6;
    $vitri = !empty($_GET['vitri'])?$_GET['vitri']:1;
    $vitritrongtrang = ($vitri - 1) * $soluong;
    $sqll = "SELECT *
    FROM hoso, baithi
    WHERE hoso.Id=baithi.Id AND Dot_Thi = $show_date";
    $tong = mysqli_query($conn, $sqll);
   $tongtk = mysqli_num_rows($tong);
   $sotrang = ceil($tongtk / $soluong); 
    if(isset($_POST["tukhoa"]) && $tukhoa != ""){
        $sql = "SELECT *
        FROM hoso, baithi
        WHERE hoso.Id=baithi.Id AND Dot_Thi = $show_date AND Ho_Ten LIKE '%".$tukhoa."%'";
        $rs = mysqli_query($conn, $sql);
        }else{
            $sql = "SELECT *
            FROM hoso, baithi
            WHERE hoso.Id=baithi.Id AND Dot_Thi = $show_date LIMIT $soluong OFFSET $vitritrongtrang";
            $rs = mysqli_query($conn, $sql);
        }
        include "../connect/connect.php";
        $cc="SELECT * FROM diemchuan";
        global $conn;   
        $x=mysqli_query($conn, $cc);
        $r = mysqli_fetch_array($x);
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
    <link rel="stylesheet" href="../thituyen/footer.css">
    <link rel="stylesheet" href="../thituyen/menu.css">
    <link rel="stylesheet" href="thongke.css">
    <link rel="stylesheet" href="../lienhe/lienhe.css">

    <title>Thi năng khiếu ngành Giáo dục mầm non</title>
</head>
<style>
    header {
        background-image: url('https://demo.joomshaper.com/2017/travelia/images/demo/logo-bg.png');
    }

    #search {
        padding: 5px;
    }

    .list-menu {
        padding: 0px;
    }

    .table td,
    th {
        text-align: center;
    }

    .nextpage {
        display: flex;
        justify-content: right;
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
                <nav>
                    <ul class="list-menu">
                        <li><a href="../thituyen/trangchu.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="fas fa-home"></i> Trang
                                chủ</a></li>
                        <li><a href="../dangkihoso/dangkihoso.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="fas fa-address-card"></i> Đăng kí hồ sơ</a></li>
                        <li><a href="../tintuc/tintuc.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="far fa-newspaper"></i> Tin tức</a></li>
                        <li><a href="../lienhe/lienhe.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="fas fa-envelope"></i> Liên hệ</a></li>
                        <li><a href="../thongke/thongke.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="fas fa-info-circle"></i> Thống kê</a></li>
                        <li><a href="../phongthi/phongthi.php?id=<?php echo $_SESSION['id'] ?>"><i
                                    class="fa-solid fa-person-booth"></i> Phòng thi</a></li>
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

                    // $sql = "SELECT * FROM login WHERE Id=$idTK ";
                    // $rs = mysqli_query($conn, $sql);

                    // if($_GET['id'] == " "){                     
                    //     echo "user";
                    
                    // }else{

                    //     while($rows = mysqli_fetch_array($rs)){
                    //         echo $rows['Ten_TS'];
                    //     }
                    // }
                    if (!isset($_SESSION["user"])) {
                        //     header("Location: ../login/login.php");
                        echo "Tài Khoản";
                        }else{
                        echo $_SESSION["user"];
                        }
                        
                    ?>
                        <i class="fas fa-chevron-down"></i></p>

                    <div class="box-login">
                        <?php
                         if (isset($_SESSION["user"])) { ?>
                        <!-- //     header("Location: ../login/login.php"); -->
                        <p><a href="../creatacc/updatekey.php">Đổi mật khẩu</a></p>
                        <?php   }else{ ?>
                        <p><a href="../creatacc/creatacc.php">Đăng Ký</a></p>
                        <?php    }
                        ?>
                        <?php
                         if (!isset($_SESSION["user"])) { ?>
                        <!-- //     header("Location: ../login/login.php"); -->
                        <p><a href="../login/login.php">Đăng Nhập</a></p>
                        <?php   }else{ ?>
                        <p><a href="../login/logout.php">Đăng Xuất</a></p>
                        <?php    }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <section class="web">
        <div class="container">
            <p class="title">DANH SÁCH THÍ SINH THI TUYỂN NGÀNH GIÁO DỤC MẦM NON</p>
            <table class="table">
                <div class="chucnang">
                    <div class="select">
                        <a href="#">Sắp xếp danh sách <i class="fa-solid fa-caret-down"></i></a>
                        <div class="list-select">
                            <p><a href="thongke.php?id=<?php echo $_GET['id'];?>">Thí sinh đăng kí</a></p>
                            <p><a href="thongkekq.php?id=<?php echo $_GET['id'];?>">Kết quả thi</a></p>
                            <!-- <div class="list1">
                                <p><a href="../thongke/thongkenam.php?id=<?php echo $_GET['id'];?>">Năm dự thi</a></p>
                                <div class="list2">
                                <p><a href="../thongke/thongkenam1.php?id=<?php echo $_GET['id'];?>&time=2022">2022</a></p>
                                    <p><a href="../thongke/thongkenam1.php?id=<?php echo $_GET['id'];?>&time=2021">2021</a></p>
                                    <p><a href="../thongke/thongkenam1.php?id=<?php echo $_GET['id'];?>&time=2020">2020</a></p>
                                    <p><a href="../thongke/thongkenam1.php?id=<?php echo $_GET['id'];?>&time=2019">2019</a></p>
                                </div>
                            </div> -->
                            <div class="list1">
                                <p><a href="thongkekv1.php?id=<?php echo $_GET['id'];?>">Khu vực thi</a></p>
                                <div class="list2">
                                    <p><a href="../thongke/thongkekv.php?id=<?php echo $_GET['id'];?>&kv=KV1">Khu vực
                                            1</a></p>
                                    <p><a href="../thongke/thongkekv.php?id=<?php echo $_GET['id'];?>&kv=KV2">Khu vực
                                            2</a></p>
                                    <p><a href="../thongke/thongkekv.php?id=<?php echo $_GET['id'];?>&kv=KV2-NT">Khu vực
                                            2 - NT</a></p>
                                    <p><a href="../thongke/thongkekv.php?id=<?php echo $_GET['id'];?>&kv=Kv3">Khu vực
                                            3</a></p>

                                </div>
                            </div>
                            <div class="list1">
                                <p><a href="thongkedt1.php?id=<?php echo $_GET['id'];?>">Năm dự thi</a></p>
                                <div class="list2">
                                    <p><a href="../thongke/thongkedt.php?id=<?php echo $_GET['id'];?>&dt=2022">Năm
                                            2022</a></p>
                                    <p><a href="../thongke/thongkedt.php?id=<?php echo $_GET['id'];?>&dt=2021">Năm
                                            2021</a></p>
                                    <p><a href="../thongke/thongkedt.php?id=<?php echo $_GET['id'];?>&dt=2020">Năm
                                            2020</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="../thongke/thongkekq.php?id=<?php echo $_GET['id'];?>" method="post">
                        <div class="search">
                            <input type="text" name="tukhoa" id="" placeholder="Tìm kiếm">
                            <button type="submit" name="timkiem">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ Tên</th>
                        <th scope="col">Ngày Sinh</th>
                        <th scope="col">Địa Chỉ</th>
                        <th scope="col">Toán</th>
                        <th scope="col">Văn</th>
                        <th scope="col">Điểm xét NK 1</th>
                        <th scope="col">Điểm xét NK 2</th>
                        <th scope="col">Tổng điểm</th>
                        <th scope="col">Kết quả</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                        $i= 1;
                        while($rows = mysqli_fetch_array($rs)){ ?>
                    <?php
                        $diemsan = $r['Diem_Chuan'];
                        $diemuutien = "";
                        $diemthpt = "";
                        $diemuthc = "";
                        if($rows['To_Hop'] == 'M01'){
                            $diemthpt = $rows['Diemxt'];
                        }
                        if($rows['To_Hop'] == 'M03'){
                            $diemthpt = $rows['Diem_Van'];
                        }
                        if($rows['Khu_Vuc'] == 'KV1'){
                            $diemuutien = 0.75; 
                        }
                        if($rows['Khu_Vuc'] == 'KV2'){
                            $diemuutien = 0.25; 
                        }
                        if($rows['Khu_Vuc'] == 'Chọn'){
                            $diemuutien = 0; 
                        }
                        if($rows['Khu_Vuc'] == 'KV2-NT'){
                            $diemuutien = 0.5; 
                        }
                        if($rows['Khu_Vuc'] == 'KV3'){
                            $diemuutien = 0; 
                        }
                        if($rows['Uu_Tien'] == 'Hộ nghèo'){
                            $diemuthc = 1; 
                        }
                        if($rows['Uu_Tien'] == 'Con thương binh'){
                            $diemuthc = 1; 
                        }
                        if($rows['Uu_Tien'] == 'Dân tộc thiểu số'){
                            $diemuthc = 2; 
                        }
                        if($rows['Uu_Tien'] == 'Người khuyết tật nặng'){
                            $diemuthc = 2; 
                        }
                        if($rows['Uu_Tien'] == 'Chọn'){
                            $diemuthc = 0; 
                        }
                        ?>
                    <tr>
                        <td><?php echo $vitritrongtrang++; ?></td>
                        <td><?php echo $rows['Ho_Ten']; ?></td>
                        <td><?php echo date("d/m/Y",strtotime($rows['Ngay_Sinh'])); ?></td>
                        <td><?php echo $rows['Dia_Chi']; ?></td>
                        <td><?php echo $rows['Diemxt']; ?></td>
                        <td><?php echo $rows['Diem_Van']; ?></td>
                        <td><?php if($rows['Diem'] == 0){
                            echo '<div><p style="color:red">Chưa có kết quả</p></div>';
                        }else{ echo $rows['Diem'];} ?></td>
                        <td><?php if($rows['Diemnk2'] == 0){
                            echo '<div><p style="color:red">Chưa có kết quả</p></div>';
                        }else{ echo $rows['Diemnk2'];} ?></td>
                        <td><?php if($rows['Diemnk2'] == 0){
                            echo '<div><p style="color:red">Chưa có kết quả</p></div>';
                        }else{ echo $rows['Diemnk2']+$rows['Diem']+$diemthpt+$diemuutien+$diemuthc;} ?></td>
                        <td><?php if($rows['Diemnk2' || $rows['Diem']] == 0 || $diemsan == 0){
                            echo '<div><p style="color:red">Chưa có kết quả</p></div>';
                        }else{
                            if(($rows['Diemnk2']+$rows['Diem']+$diemthpt+$diemuutien+$diemuthc) < $diemsan){
                                echo '<div><p style="color:red">Trượt</p></div>';
                            }else{ echo '<div><p style="color:green">Trúng Tuyển</p></div>';}
                        } ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="nextpage">
                <ul class="nextpage">
                    <?php if($vitri >3){
                            $trangmot =1 ;?>
                    <li><a href="?id=<?=$id?>&soluong=<?=$soluong?>&vitri=<?=$trangmot?>">First</a></li>
                    <?php } ?>
                    <?php if($vitri > 1 ){
                            $quaylai = $vitri - 1 ;?>
                    <li><a href="?id=<?=$id?>&soluong=<?=$soluong?>&vitri=<?=$quaylai?>">Prev</a></li>
                    <?php } ?>
                    <?php for($num = 1 ;$num <= $sotrang;$num++){ ?>
                    <?php if($num != $vitri){ ?>
                    <?php if($num > $vitri - 3 && $num < $vitri +3){ ?>
                    <li><a href="?id=<?=$id?>&soluong=<?=$soluong?>&vitri=<?=$num?>"><?=$num?></a></li>
                    <?php }?>
                    <?php }else{ ?>
                    <strong><?=$num?></strong>
                    <?php }?>
                    <?php }?>
                    <?php if($vitri < $sotrang){
                            $tienlen = $vitri + 1 ;?>
                    <li><a href="?id=<?=$id?>&soluong=<?=$soluong?>&vitri=<?=$tienlen?>">Next</a></li>
                    <?php } ?>
                    <?php if($vitri < $sotrang - 2){
                            $trangcuoi = $sotrang ;?>
                    <li><a href="?id=<?=$id?>&soluong=<?=$soluong?>&vitri=<?=$trangcuoi?>">Last</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-6">
                    <div class="contact">
                        <p>LIÊN HỆ</p>
                        <p><i class="fas fa-map-marker-alt"></i> 54, Triều Khúc, Thanh Xuân, Hà Nội</p>
                        <p><a href="#!"><i class="fas fa-phone-alt"></i> 0989463452</a></p>
                        <p><a href="#!"><i class="far fa-envelope"></i> daihoccngtvt@gmail.com</a></p>
                        <p><a href="#!"><i class="fab fa-internet-explorer"></i> utt.edu.vn</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6">
                    <div class="contact">
                        <p>Liên kết Website</p>
                        <p><a href="https://moet.gov.vn/Pages/home.aspx">Bộ Giáo dục và Đào tạo</a></p>
                        <p><a
                                href="http://www.molisa.gov.vn/Pages/PageNotFoundError.aspx?requestUrl=http://www.molisa.gov.vn/vi/Pages/Trangchu.aspx">Bộ
                                Lao động - Thương binh và Xã hội</a></p>
                        <p><a href="https://moet.gov.vn/giaoducquocdan/giao-duc-mam-non/Pages/Default.aspx">Vụ Giáo dục
                                Mầm non</a></p>
                        <p><a href="http://cdsptw.edu.vn/">Cục Hợp tác quốc tế</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6">
                    <div class="contact">
                        <p>Tư vấn</p>
                        <p><a href="#!">Vui lòng nhập Email</a></p>
                        <form action="../lienhe/lienhe.php?id=<?php echo $_SESSION['id'] ?>" method="post">
                            <div class="input_email">
                                <input type="text" name="nhapemail" id="input_email" placeholder="Nhập Email">
                                <label for=""><button><i class="fas fa-paper-plane"></i></button></label>
                            </div>
                        </form>>
                        <div class="fa">
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-youtube"></i>
                            <i class="fab fa-instagram"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="wrapper">
        <a href="../lienhe/lienhe.php?id=<?php echo $_SESSION['id'] ?>">
            <div class="ring">
                <div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show">
                    <div class="coccoc-alo-ph-circle"></div>
                    <div class="coccoc-alo-ph-circle-fill"></div>
                    <div class="coccoc-alo-ph-img-circle"></div>
                </div>
            </div>
        </a>
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