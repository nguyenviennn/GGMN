<?php
    session_start();
    // var_dump($_SESSION["user"]);
    if (!isset($_SESSION["user"])) {
        $_SESSION["loii"] = "Bạn chưa có tài khoản để có thể đăng kí hồ sơ !!!";
        header("Location: ../login/login.php");  
    };
    $thongbao = "";
     $id = $_SESSION['id'];
    // echo htmlspecialchars($_SERVER["PHP_SELF"]);
    include "../connect/connect.php";
    $cc="SELECT * FROM hoso";
    global $conn;
    $x=mysqli_query($conn, $cc);
    while($row = $x->fetch_assoc()) { 
        if($id == $row['Id']){
            $thongbao = "Tài khoản đã đăng kí hồ sơ, vui lòng kiểm tra lại !!!";
            $_SESSION['disabled'] = 'disabled=""';
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
    <link rel="stylesheet" href="dangkihoso.css">
    <link rel="stylesheet" href="../thituyen/footer.css">
    <link rel="stylesheet" href="../thituyen/menu.css">
    <link rel="stylesheet" href="../lienhe/lienhe.css">


    <title>Thi năng khiếu ngành Giáo dục mầm non</title>
</head>
<style>
    .star{
        color: red;
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
                        <li><a href="dangkihoso.php?id=<?php echo $_SESSION['id'] ?>"><i
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
            <h2>Phiếu đăng kí hồ sơ xét tuyển</h2>
            <form action="guihoso.php?id=<?php echo $_SESSION['id'] ?>" method="post" enctype="multipart/form-data"
                role="form">
                <?php
                    if($thongbao != ""){ ?>
                <div style="color:red;"><?php echo $thongbao; ?></div>
                <?php }?>
                <b>1. Thông tin cá nhân: </b>
                <div class="row">
                    <div class="col">
                        <label for="fname">Họ Tên:<span class="star">*</span></label>
                        <input type="text" class="form-control" placeholder="Nhập họ tên" name="hoten">
                    </div>
                    <div class="col">
                        <label for="start">Ngày sinh:<span class="star">*</span> </label>
                        <input type="date" class="form-control"  placeholder="dd-mm-yyyy" name="ngaysinh">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="fphone">CMT/CCCD:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="Nhập số thẻ căn cước" name="cccd">
                    </div>
                    <div class="col">
                        <label for="fphone">Số điện thoại:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="sdt">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="fphone">Email:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="Nhập Email" name="email">
                    </div>
                    <div class="col">
                        <label for="fphone">Địa chỉ:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="Nhập nơi ở hiện tại" name="diachi">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="gioi-tinh" for="fgioitinh">Giới tính:<span class="star">*</span> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" checked = 'checked'
                                <?php if(!empty($gioitinh) && $gioitinh == 'Nam')  echo "checked = 'checked'"?>
                                name="gioitinh" value="Nam">
                            <label class="form-check-label" for="inlineCheckbox1" name="gioitinh">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2"
                                <?php if(!empty($gioitinh) && $gioitinh == 'Nữ')  echo "checked = 'checked'"?>
                                name="gioitinh" value="Nữ">
                            <label class="form-check-label" for="inlineCheckbox2" name="gioitinh">Nữ</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh chân dung:<span class="star">*</span> </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anh">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Giấy chứng nhận ưu tiên, CCCD:<span class="star">*</span> </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anhxm[]"
                                multiple="multiple">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mô tả bản thân:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="mota"></textarea>
                        </div>
                    </div>
                </div>
                <b>2.Thông tin thi tuyển tuyển: </b>
                <br>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label style="margin-top:0" class="input-group-text" for="inputGroupSelect01">Đối
                                        tượng ưu tiên<span class="star">*</span></label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="uutien">
                                    <option selected>Chọn</option>
                                    <option value="Hộ nghèo">Gia đình hộ nghèo</option>
                                    <option value="Con thương binh">Con thương binh liệt sĩ</option>
                                    <option value="Dân tộc thiểu số">Dân tộc thiểu số</option>
                                    <option value="Người khuyết tật nặng">Người bị khuyết tật nặng</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="inputAddress">Khác: </label>
                                <input type="text" class="form-control" id="inputAddress"
                                    placeholder="VD: Gia đình thuộc diện hộ nghèo" name="uutien">
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label style="margin-top:0" class="input-group-text" for="inputGroupSelect01">Khu vực
                                    thi tuyển<span class="star">*</span></label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="khuvuc">
                                <option selected>Chọn</option>
                                <option value="KV1">KV1</option>
                                <option value="KV2">KV2</option>
                                <option value="KV2-NT">KV2-NT</option>
                                <option value="KV3">KV3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label style="margin-top:0" class="input-group-text" for="inputGroupSelect01">Năm thi
                                    tuyển<span class="star">*</span>
                                </label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="dotthi">
                                <option selected>Chọn</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label style="margin-top:0" class="input-group-text" for="inputGroupSelect01"> Tổ hợp
                                    xét tuyển<span class="star">*</span>
                                </label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="tohop">
                                <option selected>Chọn</option>
                                <option value="M01">M01 (Toán + Năng Khiếu 1 + Năng khiếu 2)</option>
                                <option value="M03">M03 (Văn + Năng khiếu 1 + Năng khiếu 2)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="fphone">Điểm xét tuyển Đại học môn Văn:<span class="star">*</span> </label>
                            <input type="text" class="form-control" placeholder="VD: Văn 7.5" name="diemxtv">
                        </div>
                        <div class="col">
                            <label for="fphone">Điểm xét tuyển Đại học môn Toán:<span class="star">*</span> </label>
                            <input type="text" class="form-control" placeholder="VD:Toán 9" name="diemxt">
                        </div>
                    </div>
                    <div class="btn-bottom">
                        <button type="submit" class="btn btn-primary" <?php if(isset($_SESSION['disabled'])){ echo $_SESSION['disabled'];}?>>Gửi</button>
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
                        <form action="../lienhe/lienhe.php?id=<?php echo $_SESSION['id'] ?>" method="post">
                        <div class="input_email">
                            <input type="text" name="nhapemail" id="input_email" placeholder="Nhập Email">
                            <label for=""><button><i class="fas fa-paper-plane"></i></button></label>
                        </div>
                        </form>
                        <div class="fa">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
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