<?php
      session_start();
      // var_dump($_SESSION["user"]);
      // if (!isset($_SESSION["user"])) {
      //     header("Location: ../login/login.php");
      // };
      if(isset($_GET["id"])){
          $_SESSION["id"] = $_GET['id'];
      }else{
          $_SESSION["id"] = '';
      }
    include "../connect/connect.php";
    global $conn;
    $id = $_SESSION['id'];
    $soluong = !empty($_GET['soluong'])?$_GET['soluong']:5;
    $vitri = !empty($_GET['vitri'])?$_GET['vitri']:1;
    $vitritrongtrang = ($vitri - 1) * $soluong;
    $sqll = "SELECT * FROM tintuc";
    $tong = mysqli_query($conn, $sqll);
   $tongtk = mysqli_num_rows($tong);
   $sotrang = ceil($tongtk / $soluong); 
    $sql_select ="SELECT * FROM tintuc LIMIT $soluong OFFSET $vitritrongtrang";
    $tt = mysqli_query($conn,$sql_select);
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
    <link rel="stylesheet" href="tintuc.css">
    <link rel="stylesheet" href="../thituyen/footer.css">
    <link rel="stylesheet" href="../thituyen/menu.css">
    <link rel="stylesheet" href="../lienhe/lienhe.css">
    <title>Thi năng khiếu ngành Giáo dục mầm non</title>
</head>
<style>
    header {
        background-image: url('https://demo.joomshaper.com/2017/travelia/images/demo/logo-bg.png');
    }

    .img-item {
        overflow: hidden;
        height: 260px;
    }

    #search {
        padding: 5px;
    }

    .list-menu {
        padding: 0px;
    }
    .btn-scroll button{
    text-align: center;
    line-height: 40px;
    cursor: pointer;
    width: 40px;
    background: #0674ec;
    color: #fff;
    position: fixed;
    border-radius: 50%;
    right: 2%;
    bottom: 20px;
    border: 1px solid transparent;
}
.date span{
    font-weight: 600;
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
                                    class="fas fa-home"></i> Trang chủ</a></li>
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
        <section class="banner1">
            <div>
                <img src="https://sites.google.com/site/haipvph02982/_/rsrc/1415680166186/home/tin-tuc/illus-banner-big-01.jpg"
                    alt="">
            </div>
        </section>
        <section class="item">
            <div class="container">
                <div class="link" style="margin-top:0px;">
                    <a href="../thituyen/trangchu.php">Trang chủ </a><span> > </span><a href="../tintuc/tintuc.php"> Tin tức</a>
                    <div class="text">
                        <p>Tin tức</p>
                    </div>
                </div>
                <div class="news">
                    <div class="row" id="page-news">
                        <?php while ($news = mysqli_fetch_array($tt)){?>
                        <div class="col-lg-6 col-md-6">
                            <div class="item-item">
                                <div class="img-item">
                                    <img src="<?php echo $news['Hinh_Anh'] ?>" alt="">
                                </div>
                                <div class="item-bot">
                                <a href="../chitiettintuc/chitiettintuc.php?id=<?php echo $_SESSION['id'] ?>">
                                    <h3>
                                        <span style="font-weight: 600;"><?php echo $news['Ten_Tin']; ?></span>
                                    </h3>
                                    </a>
                                    <div class="bot">
                                        <div class="date">
                                            <span><i class="fa-solid fa-timer"></i>
                                            <?php echo date("d/m/Y",strtotime($news['Thoi_Gan']));?><span>
                                        </div>
                                        <div class="text-news">
                                            <?php echo $news['Nd_Tin']; ?>
                                        </div>
                                        <div class="btn-more more1">
                                        <a href="../chitiettintuc/chitiettintuc.php?id=<?php echo $_SESSION['id'] ?>"><span>Xem thêm <i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
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
                    <?php if($vitri < $sotrang - 3){
                            $trangcuoi = $sotrang ;?>
                    <li><a href="?id=<?=$id?>&soluong=<?=$soluong?>&vitri=<?=$trangcuoi?>">Last</a></li>
                    <?php } ?>
                </ul>
            </div>
                </div>
            </div>
        </section>
        <div class="btn-scroll">
        <button id="btn-scroll"><i class="fas fa-chevron-up"></i></button>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-6">
                    <div class="contact">
                        <p>LIÊN HỆ</p>
                        <p><i class="fas fa-map-marker-alt"></i>54, Triều Khúc, Thanh Xuân, Hà Nội</p>
                        <p><a href="#!"><i class="fas fa-phone-alt"></i>0989463452</a></p>
                        <p><a href="#!"><i class="far fa-envelope"></i>daihoccngtvt@gmail.com</a></p>
                        <p><a href="#!"><i class="fab fa-internet-explorer"></i> utt.edu.vn</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6">
                <div class="contact">
                        <p>Liên kết Website</p>
                        <p><a href="https://moet.gov.vn/Pages/home.aspx">Bộ Giáo dục và Đào tạo</a></p>
                        <p><a href="http://www.molisa.gov.vn/Pages/PageNotFoundError.aspx?requestUrl=http://www.molisa.gov.vn/vi/Pages/Trangchu.aspx">Bộ Lao động - Thương binh và Xã hội</a></p>
                        <p><a href="https://moet.gov.vn/giaoducquocdan/giao-duc-mam-non/Pages/Default.aspx">Vụ Giáo dục Mầm non</a></p>
                        <p><a href="http://cdsptw.edu.vn/">Cục Hợp tác quốc tế</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6">
                    <div class="contact">
                        <p>Tư vấn</p>
                        <p><a href="#!">Vui lòng nhập Email</a></p>
                        <div class="input_email">
                            <input type="text" name="" id="input_email" placeholder="Nhập Email">
                            <label for=""><button><i class="fas fa-paper-plane"></i></button></label>
                        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="../thituyen/thituyenmn.js"></script>

</html>