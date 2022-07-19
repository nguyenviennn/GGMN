 <?php
    session_start();
    // var_dump($_SESSION["user"]);
    $id = $_SESSION['id'];
    include "../connect/connect.php";
    $cc="SELECT * FROM hoso WHERE Id = $id";
    global $conn;   
    $x=mysqli_query($conn, $cc);
    if(mysqli_num_rows($x) > 0){
    }else{
        header("Location: ../dangkihoso/dangkihoso.php?id=$id");
        $_SESSION['xths'] = "<script>alert('Bạn chưa đăng kí hồ sơ !');</script>";
    }
    if($id == ""){
        unset($_SESSION['xths']);
    }
    include "../connect/connect.php";
   $cc="SELECT * FROM diemchuan";
   global $conn;   
   $x=mysqli_query($conn, $cc);
   $r = mysqli_fetch_array($x);
    $a = "";
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    date_default_timezone_get();
    $time_now = getdate();
    if($time_now["mon"] < 10)
    {
        $thang = '0';
    }
    if($time_now["mday"] < 10)
    {
        $ngay = '0';
    }
    $show_date = $time_now["year"].'-'."$thang".$time_now["mon"].'-'."$ngay".$time_now["mday"];
    if($show_date != $r['Ngay_Thi']){
        header("Location: ../thituyen/trangchu.php?id=$id");
        $_SESSION['xttt'] = "<script>alert('Thời gian nộp bài vào ngày ".date("d/m/Y",strtotime($r['Ngay_Thi']))." !');</script>";
    }
    // echo $_SESSION['id'];
    // echo htmlspecialchars($_SERVER["PHP_SELF"]);
    $a = "";
    $id = $_SESSION['id'];
   // echo htmlspecialchars($_SERVER["PHP_SELF"]);
   include "../connect/connect.php";
   $cc="SELECT * FROM hoso WHERE Id = $id";
   global $conn;   
   $x=mysqli_query($conn, $cc);
   $r = mysqli_fetch_array($x);
   
   if(mysqli_num_rows($x) > 0 ){
   
  }else{
      $a = "Bạn chưa có hồ sơ, vui lòng đăng kí !!!";
  }
  $sql_xt="SELECT * FROM login WHERE Id = $id";
  global $conn;   
  $xt=mysqli_query($conn, $sql_xt);
  $rows = mysqli_fetch_array($xt);
  if($rows['Duyet'] == "Thông tin chính xác"){
    
  }else{
    header("Location: ../thituyen/trangchu.php?id=$id");
    $_SESSION['xttt'] = "<script>alert('Thông tin cá nhân chưa được xác thực !');</script>";
  }
    if(isset($_SESSION['phong'])){
        $a = $_SESSION['phong'];
}
    unset($_SESSION["phong"]);

    if (!isset($_SESSION["user"])) {
        $_SESSION["loii"] = "Bạn chưa có tài khoản để có thể đăng kí hồ sơ !!!";
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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link
         href="https://fonts.googleapis.com/css2?family=Arvo&family=Quicksand:wght@300&family=Roboto:wght@100&display=swap"
         rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
     <link rel="stylesheet" href="phongthi.css">
     <link rel="stylesheet" href="../thituyen/footer.css">
     <link rel="stylesheet" href="../thituyen/menu.css">
     <link rel="stylesheet" href="../lienhe/lienhe.css">


     <title>Thi năng khiếu ngành Giáo dục mầm non</title>
 </head>
<style>
    .img-room{
        transition: all 0.2s;
    }
    .img-room:hover{
        background-color: #222f3e;
        transition: all 0.2s;
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
     <section class="container">

         <div class="room">
             <div class="row">
                 <?php
         if($a != ""){ ?>
                 <div style="color:red;"><?php echo $a; ?></div>
                 <?php }?>
                 <?php   
            include "../connect/connect.php";
            global $conn;
        $sql = "SELECT * FROM phongthi ";
        $rs = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($rs)){ ?>
                 <div class="col-lg-4">
                     <a href="../baithi/baithi.php?id=<?php echo $_SESSION['id'] ?>&&ip=<?php echo $row['Id_Phong'] ?>">
                         <div class="list-room">
                             <div class="img-room">
                                 <p style="font-size:30px;"><?php echo $row['Ki_Thi'] ?></p>
                             </div>
                             <div class="text-room">
                                 <p><a href="#">Phòng thi năm <?php echo $row['Doi_Thi'] ?></a></p>
                             </div>
                         </div>
                     </a>
                 </div>
                 <?php } ?>
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
                        <p><a href="http://www.molisa.gov.vn/Pages/PageNotFoundError.aspx?requestUrl=http://www.molisa.gov.vn/vi/Pages/Trangchu.aspx">Bộ Lao động - Thương binh và Xã hội</a></p>
                        <p><a href="https://moet.gov.vn/giaoducquocdan/giao-duc-mam-non/Pages/Default.aspx">Vụ Giáo dục Mầm non</a></p>
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