<?php
    session_start();
    // var_dump($_SESSION["user"]);
    if (!isset($_SESSION["user"])) {
        header("Location: ../login/login.php");
    };
    $thongbao = "";
     $id = $_SESSION['id'];
    // echo htmlspecialchars($_SERVER["PHP_SELF"]);
    include "../connect/connect.php";
    $uploadOk = 1;
    $cc="SELECT * FROM baithi";
    global $conn;   
    $x=mysqli_query($conn, $cc);
    while($row = $x->fetch_assoc()) { 
        if($id == $row['Id']){
            $uploadOk = 0;
            $loi = "Tài khoản đã gửi bài thi vui lòng kiểm tra lại!!!";
            $_SESSION['disabled1'] = 'disabled=""';
        }         
    }
    $xx="SELECT * FROM hoso WHERE Id = $id";
    global $conn;   
    $c=mysqli_query($conn, $xx);
    $rows = $c->fetch_assoc();
    if(isset($_FILES['video']['name']) && $_FILES['video']['name'] != ''){
    $loivideo = "";
    $loi = "";
    $target_dir = "video/";
                $target_file = $target_dir . basename($_FILES["video"]["name"]);
              
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["video"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $loivideo = "Không video !!!";
                    $uploadOk = 0;
                }
                }

                if ($_FILES["video"]["size"] > 40000000) {
                $loivideo = "Kích thước quá lớn !!!";
                $uploadOk = 0;
                }

                if($imageFileType != "mp4" && $imageFileType != "3gp" && $imageFileType != "mpeg"
                && $imageFileType != "avi" ) {
    
                $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                $loivideo = "Không thể tải file !!!";
                } else {
                if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
                } 
                }
                $duongdanfile = "http://localhost:81/web/doan/baithi/video/" .htmlspecialchars( basename( $_FILES["video"]["name"]));

                    // $gioitinh = (isset($_POST['gioitinh'])) ? $_POST['gioitinh']:"";
                    $id = $_GET["id"];

                    if($uploadOk == 0){
                        $loi = "Vui lòng kiểm tra lại thông tin trên hồ sơ !!!";
                    }else{
                        include("../connect/connect.php");
                        $sql_insert = "INSERT INTO  baithi (Id,Bai_Thi) VALUES ($id,'$duongdanfile') ";
                         mysqli_query($conn, $sql_insert);
                         $sql = "UPDATE login SET baithi = 1 WHERE Id = $id";
                         mysqli_query($conn, $sql);

                        $thongbao = "Bài thi đã được gửi đi !!!";
                    }
                }else{
                    $uploadOk = 0;
                    $loivideo = "Vui lòng chọn file !!!" ;
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
    <link rel="stylesheet" href="../dangkihoso/dangkihoso.css">
    <link rel="stylesheet" href="../thituyen/footer.css">
    <link rel="stylesheet" href="../thituyen/menu.css">
    <link rel="stylesheet" href="../lienhe/lienhe.css">


    <title>Thi năng khiếu ngành Giáo dục mầm non</title>
</head>

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
                        <li><a href="../dangkihoso/dangkihoso.php?id=<?php echo $_SESSION['id'] ?>"><i class="fas fa-address-card"></i> Đăng kí hồ sơ</a></li>
                        <li><a href="../tintuc/tintuc.php?id=<?php echo $_SESSION['id'] ?>"><i class="far fa-newspaper"></i> Tin tức</a></li>
                        <li><a href="../lienhe/lienhe.php?id=<?php echo $_SESSION['id'] ?>"><i class="fas fa-envelope"></i> Liên hệ</a></li>
                        <li><a href="../thongke/thongke.php?id=<?php echo $_SESSION['id'] ?>"><i class="fas fa-info-circle"></i> Thống kê</a></li>
                        <li><a href="../phongthi/phongthi.php?id=<?php echo $_SESSION['id'] ?>"><i class="fa-solid fa-person-booth"></i> Phòng thi</a></li>
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
                    // $conn = new mysqli($servername, $username, $password,$dbname);
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
        <div class="form-dangki">
            <h2>Phiếu gửi bài thi Online</h2>
            <form action="baithi1.php?id=<?php echo $_SESSION['id'] ?>" method="post" enctype="multipart/form-data"
                role="form">
                <?php
            
                if(isset($loi)&&$loi != ""){ ?>
                    <div style="color:red;"><?php echo $loi; ?></div>
                    <?php }?>
                <?php
                    if($thongbao != ""){ ?>
                <div style="color:green;"><?php echo $thongbao; ?></div>
                <?php }?>
                
                <p>1. Thông tin cá nhân: </p>
                <div class="row">
                    <div class="col">
                        <label for="fname">Họ Tên: </label>
                        <input type="text" class="form-control" placeholder="Nhập họ tên" name="hoten" value="<?php echo  $rows['Ho_Ten'];?>">
                    </div>
                    <div class="col">
                        <label for="fname">Email: </label>
                        <input type="text" class="form-control" placeholder="Nhập họ tên" name="email" value="<?php echo  $rows['Email'];?>">
                    </div>
                  
                </div>
                <div class="row">
                    <div class="col">
                        <label for="fphone">CMT/CCCD: </label>
                        <input type="text" class="form-control" placeholder="Nhập số thẻ căn cước" name="cccd" value="<?php echo $rows['CCCD']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">File bài thi: </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="video">
                        </div>
                        <?php
                    if($loivideo != ""){ $uploadOk = 0 ?>
                <div style="color:red;"><?php echo $loivideo; ?></div>
                <?php }?>
                    </div>
                </div>
                <div class="btn-bottom">
                    <button type="submit" class="btn btn-primary"<?php if(isset($_SESSION['disabled1'])){ echo $_SESSION['disabled1'];}?>>Gửi</button>
                </div>
            </form>

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