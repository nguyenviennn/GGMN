<?php
    session_start();
    // var_dump($_SESSION["user"]);
    // if (!isset($_SESSION["user"])) {
    //     header("Location: ../login/login.php");
    // };
    $_SESSION["id"] = $_GET['id'];
    $loi = "";
    $thongbao = "";
    $uploadOk = 1;
    $hoten = (isset($_POST["hoten"])) ? $_POST["hoten"]:"";
    $dienthoai = (isset($_POST["dienthoai"])) ? $_POST["dienthoai"]:"";
    $email = (isset($_POST["email"])) ? $_POST["email"]:"";
    $cauhoi = (isset($_POST["cauhoi"])) ? $_POST["cauhoi"]:"";
    $nhapemail = (isset($_POST["email"])) ? $_POST["email"]:"";
    $nhapemaill = (isset($_POST["nhapemail"])) ? $_POST["nhapemail"]:"";

if(isset($_POST['submit']) && $uploadOk != 0){
    if(isset($_POST['submit']) && $_POST['hoten'] != '' && $_POST['cauhoi'] != '' && $_POST['email'] != '' && $_POST['dienthoai'] != ''){
        include "../connect/connect.php";
        global $conn;
        $sql_ir = "INSERT INTO hotro(Ho_Ten,Cau_Hoi,Email,Dien_Thoai) VALUES ('$hoten', '$cauhoi','$email','$dienthoai')";
        mysqli_query($conn, $sql_ir);
        echo "<script>alert('Đã ghi nhận thắc mắc !');</script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Arvo&family=Quicksand:wght@300&family=Roboto:wght@100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="lienhe.css">
    <link rel="stylesheet" href="../thituyen/footer.css">
    <link rel="stylesheet" href="../thituyen/menu.css">
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
    <section>
        <div class="container">
            <div class="form-lienhe">
                <form action="../lienhe/lienhe.php?id=<?php echo $_SESSION['id'] ?>" method="post">
                    <div class="row">
                        <div class="link">
                            <a href="#!">Trang chủ </a><span> > </span><a href="#">Liên hệ</a>
                            <p>Gửi thông tin cho chúng tôi</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="input">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="hoten" placeholder="Họ và tên"
                                            aria-label="First name" value="<?php echo $hoten ?>">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="dienthoai"
                                            placeholder="Điện thoại" aria-label="Điện thoại"
                                            value="<?php echo $dienthoai ?>">
                                        <?php
                        if(isset($_POST['submit']) && $dienthoai == ""){ $uploadOk = 0 ?>
                                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                                        <?php }?>
                                        <?php 
                        if($dienthoai != ""){
                            if (!preg_match ("/^[0-9]*$/",$dienthoai) ){  
                                $uploadOk = 0;
                                echo "Số điện thoại không hợp lệ.";
                            };
                            $length = strlen($dienthoai);
                            if($length < 10 || $length > 10){
                                $uploadOk = 0;
                                echo '<div style="color:red;">Số điện thoại không đúng định dạng !!!</div>';
                            }
                        }?>
                                    </div>

                                </div>
                            </div>
                            <div class="input">
                                <div class="row">
                                    <div class="col">
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            aria-label="First name" value="<?php echo $nhapemail;echo $nhapemaill;?>">
                                    </div>
                                    <?php
                                    if(isset($_POST['submit']) && $nhapemail == ""){ $uploadOk = 0 ?>
                                    <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                                    <?php }?>
                                    <?php
                             if($nhapemail != ""){
                            $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
                            if(preg_match($regex, $nhapemail)) { 
                            } 
                            else { 
                                $uploadOk = 0;
                                echo '<div style="color:red;">Email không đúng định dạng !!!</div>'; 
                            } 
                        }
                            ?>
                                </div>
                            </div>
                            <div class="input">
                                <div class="form-floating">
                                    <textarea class="form-control" name="cauhoi" id="floatingTextarea2"
                                        style="height: 200px"><?php echo $cauhoi ?></textarea>
                                    <label for="floatingTextarea2">Nội dung</label>
                                </div>

                            </div>
                            <div class="btn-submit">
                                <button type="submit" name="submit">Gửi</button>
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
                        </div>
                        <div class="col-lg-4">
                            <p>THÔNG TIN LIÊN HỆ</p>
                            <div class="contact1">
                                <p><i class="fas fa-map-marker-alt"></i> 54, Triều Khúc, Thanh Xuân, Hà Nội</p>
                                <p><i class="fas fa-phone-alt"></i> 0953245854</p>
                                <p><i class="fas fa-fax"></i> (024) 3.783.5641</p>
                                <p><i class="fas fa-envelope"></i> daihoccngtvt@gmail.com</p>
                                <p><i class="fab fa-internet-explorer"></i> utt.edu.vn</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3717.4755266254133!2d105.58199931488794!3d21.292218585856237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134f00da3cb9321%3A0xc0f8f922d6230a80!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgR2lhbyB0aMO0bmcgVuG6rW4gdOG6o2k!5e0!3m2!1svi!2s!4v1647851186196!5m2!1svi!2s"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
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
                        <p>Liên kết Website</p>
                        <p><a href="#!">Bộ Giáo dục và Đào tạo</a></p>
                        <p><a href="#!">Bộ Lao động - Thương binh và Xã hội</a></p>
                        <p><a href="#!">Vụ Giáo dục Mầm non</a></p>
                        <p><a href="#!">Cục Hợp tác quốc tế</a></p>
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
                        </form>
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
        <a href="lienhe.php">
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