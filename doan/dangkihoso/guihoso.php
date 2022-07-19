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
    $cc="SELECT * FROM hoso";
    global $conn;
    $x=mysqli_query($conn, $cc);
    while($row = $x->fetch_assoc()) { 
        if($id == $row['Id']){
            $thongbao = "Tài khoản đã đăng kí hồ sơ, vui lòng kiểm tra lại !!!";
            $_SESSION['disabled'] = 'disabled=""';
            header("Location: ../dangkihoso/dangkihoso.php?id=".$_SESSION['id']."");
        }          
    }
    $loi = "";
    $thongbao = "";
    $loianh = "";
     $id = $_SESSION['id'];
    // echo htmlspecialchars($_SERVER["PHP_SELF"]);
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["anh"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
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
                move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
                }
                $duongdanfile = "http://localhost:81/web/doan/dangkihoso/uploads/" .htmlspecialchars( basename( $_FILES["anh"]["name"]));
                
               if(isset($_FILES["anhxm"])){
                   $files = $_FILES["anhxm"];
                   $file_names = $files['name'];

                   foreach($file_names as $key => $val){
                       move_uploaded_file($files["tmp_name"][$key],"ttxacthuc/" .$val);
                   }
               }
            
                $hoten = $_POST["hoten"];
                $sdt = $_POST["sdt"];
                $cccd = $_POST["cccd"];
                $ngaysinh = $_POST["ngaysinh"];
                $email = $_POST["email"];
                $diachi = $_POST["diachi"];
                $mota = $_POST["mota"];
                $uutien = $_POST["uutien"];
                $khuvuc = $_POST["khuvuc"];
                $dotthi = $_POST["dotthi"];
                $diemxt = $_POST["diemxt"];
                $diemxtv = $_POST["diemxtv"];
                $tohop = $_POST["tohop"];

                $gioitinh = (isset($_POST['gioitinh'])) ? $_POST['gioitinh']:"";
                $id = $_GET["id"];
                
                include "../connect/connect.php";
                $cc="SELECT * FROM hoso";
                global $conn;   
                $x=mysqli_query($conn, $cc);
                $row = mysqli_fetch_array($x);
                while($row = $x->fetch_assoc()) { 
                    if($id == $row['Id']){
                       $uploadOk = 0;
                       $loi = "Tài khoản đã có hồ sơ đăng kí !!!";
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
                        <li><a href="dangkihoso.php"><i class="fas fa-address-card"></i> Đăng kí hồ sơ</a></li>
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
        <div class="form-dangki">
            <h2>Phiếu đăng kí hồ sơ xét tuyển</h2>
            <form action="guihoso.php?id=<?php echo $_SESSION['id'] ?>" method="post" enctype="multipart/form-data"
                role="form">
                <?php
                    if($thongbao != ""){ ?>
                <div style="color:green;"><?php echo $thongbao; ?></div>
                <?php }?>
                <?php
                    if($loi != ""){ ?>
                <div style="color:red;"><?php echo $loi; ?></div>
                <?php }?>
                <p>1. Thông tin cá nhân: </p>
                <div class="row">
                    <div class="col">
                        <label for="fname">Họ Tên:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="Nhập họ tên" name="hoten"
                            value="<?php echo $hoten; ?>">
                        <?php
                        if($hoten == ""){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin!!!"?></div>
                        <?php }?>
                    </div>
                    <div class="col">
                        <label for="fphone">Số điện thoại:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="sdt"
                            value="<?php echo $sdt; ?>">
                        <?php
                        if($sdt == ""){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                        <?php }?>
                        <?php
                        include "../connect/connect.php";
                        $cc="SELECT * FROM hoso";
                        global $conn;
                        $x=mysqli_query($conn, $cc);
                        while($row = $x->fetch_assoc()) { 
                            if($sdt == $row['SDT']){$uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Số điện thoại đã được sử dụng !!!"?></div>
                        <?php  } ?>
                        <?php } ?>
                        <?php 
                        if($sdt != ""){
                            if (!preg_match ("/^[0-9]*$/",$sdt) ){  
                                $uploadOk = 0;
                                echo '<div style="color:red;">Số điện thoại không hợp lệ !!!</div>';
                            };
                            $length = strlen($sdt);
                            if($length < 10 || $length > 10){
                                $uploadOk = 0;
                                echo '<div style="color:red;">Số điện thoại không đúng định dạng !!!</div>';
                            }
                        }
                             ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="fphone">CMT/CCCD:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="Nhập số thẻ căn cước" name="cccd"
                            value="<?php echo $cccd; ?>">
                        <?php
                        if($cccd == ""){ $uploadOk = 0; ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                        <?php }?>
                        <?php
                        include "../connect/connect.php";
                        $cc="SELECT * FROM hoso";
                        global $conn;
                        $x=mysqli_query($conn, $cc);
                        while($row = $x->fetch_assoc()) { 
                            if($cccd == $row['CCCD']){$uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Số căn cước đã được sử dụng !!!"?></div>
                        <?php  } ?>
                        <?php } ?>
                        <?php 
                        if($cccd != ""){
                            if (!preg_match ("/^[0-9]*$/",$cccd) ){  
                                $uploadOk = 0;
                                echo '<div style="color:red;">CMT/CCCD chưa đúng định dạng !!!</div>';
                            };
                            $lengthh = strlen($cccd);
                            if($lengthh != 9 && $lengthh != 12){
                                $uploadOk = 0;
                                echo '<div style="color:red;">CMT/CCCD chưa đúng định dạng !!!</div>';
                            }
                        }
                             ?>
                    </div>
                    <div class="col">
                        <label for="fphone">Ngày sinh:<span class="star">*</span> </label>
                        <input type="date" class="form-control" placeholder="Nhập ngày sinh" name="ngaysinh"
                            value="<?php echo $ngaysinh; ?>">
                        <?php
                        if($ngaysinh == ""){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="fphone">Email:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="Nhập Email" name="email"
                            value="<?php echo $email; ?>">
                        <?php
                        if($email == ""){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                        <?php }?>
                        <?php
                        include "../connect/connect.php";
                        $cc="SELECT * FROM hoso";
                        global $conn;
                        $x=mysqli_query($conn, $cc);
                        while($row = $x->fetch_assoc()) { 
                            if($email == $row['Email']){$uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Email đã được sử dụng !!!"?></div>
                        <?php  } ?>
                        <?php } ?>
                        <?php
                        if($email != ""){
                            $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
                            if(preg_match($regex, $email)) { 
                            } 
                            else { 
                                $uploadOk = 0;
                                echo '<div style="color:red;">Email không đúng định dạng !!!</div>'; 
                            } 
                        }
                            ?>
                    </div>
                    <div class="col">
                        <label for="fphone">Địa chỉ:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="Nhập nơi ở hiện tại" name="diachi"
                            value="<?php echo $diachi; ?>">
                        <?php
                        if($diachi == ""){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="gioi-tinh" for="fgioitinh">Giới tính:<span class="star">*</span> </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1"
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
                        <?php
                        if($gioitinh == ""){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh chân dung:<span class="star">*</span> </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anh">
                        </div>
                        <?php
                        if($loianh != ""){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo $loianh?></div>
                        <?php }?>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Giấy chứng nhận ưu tiên, CCCD:<span class="star">*</span> </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anhxm[]"
                                multiple="multiple">
                        </div>
                        <?php
                        if($loianh != ""){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo $loianh?></div>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mô tả bản thân:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="mota"><?php echo $mota; ?></textarea>
                        </div>
                    </div>
                </div>
                <p>2.Thông tin thi tuyển tuyển: </p>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label style="margin-top:0" class="input-group-text" for="inputGroupSelect01">Đối
                                        tượng ưu tiên<span class="star">*</span></label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="uutien">
                                    <option <?php if(isset($uutien) && $uutien == 'Chọn'){echo "selected";}?>>Chọn
                                    </option>
                                    <option <?php if(isset($uutien) && $uutien == 'Hộ nghèo'){echo "selected";}?>
                                        value="Hộ nghèo">Gia đình hộ nghèo</option>
                                    <option <?php if(isset($uutien) && $uutien == 'Con thương binh'){echo "selected";}?>
                                        value="Con thương binh">Con thương binh liệt sĩ</option>
                                    <option
                                        <?php if(isset($uutien) && $uutien == 'Dân tộc thiểu số'){echo "selected";}?>
                                        value="Dân tộc thiểu số">Dân tộc thiểu số</option>
                                    <option
                                        <?php if(isset($uutien) && $uutien == 'Người khuyết tật nặng'){echo "selected";}?>
                                        value="Người khuyết tật nặng">Người bị khuyết tật nặng</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="inputAddress">Khác: </label>
                                <input type="text" class="form-control" id="inputAddress"
                                    placeholder="VD: Gia đình thuộc diện hộ nghèo" name="uutien"
                                    value="<?php echo $uutien; ?>">
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
                                <option <?php if(isset($khuvuc) && $khuvuc == 'Chọn'){echo "selected";}?>>Chọn</option>
                                <option <?php if(isset($khuvuc) && $khuvuc == 'KV1'){echo "selected";}?> value="KV1">KV1
                                </option>
                                <option <?php if(isset($khuvuc) && $khuvuc == 'KV2'){echo "selected";}?> value="KV2">KV2
                                </option>
                                <option <?php if(isset($khuvuc) && $khuvuc == 'KV2-NT'){echo "selected";}?>
                                    value="KV2-NT">KV2-NT</option>
                                <option <?php if(isset($khuvuc) && $khuvuc == 'KV3'){echo "selected";}?> value="KV3">KV3
                                </option>
                            </select>
                        </div>
                        <?php
                        if($khuvuc == "Chọn"){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                        <?php }?>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label style="margin-top:0" class="input-group-text" for="inputGroupSelect01">Năm thi
                                    tuyển<span class="star">*</span>
                                </label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="dotthi">
                                <option <?php if(isset($dotthi) && $dotthi == 'Chọn'){echo "selected";}?>>Chọn</option>
                                <option <?php if(isset($dotthi) && $dotthi == '2022'){echo "selected";}?> value="2022">
                                    2022</option>
                                <option <?php if(isset($dotthi) && $dotthi == '2021'){echo "selected";}?> value="2021">
                                    2021</option>
                                <option <?php if(isset($dotthi) && $dotthi == '2020'){echo "selected";}?> value="2020">
                                    2020</option>
                                <option <?php if(isset($dotthi) && $dotthi == '2019'){echo "selected";}?>value="2019">
                                    2019</option>
                            </select>
                        </div>
                        <?php
                        if($dotthi == "Chọn"){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label style="margin-top:0" class="input-group-text" for="inputGroupSelect01">Tổ hợp xét
                                tuyển<span class="star">*</span>
                            </label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="tohop">
                            <option <?php if(isset($tohop) && $tohop == 'Chọn'){echo "selected";}?>>Chọn</option>
                            <option <?php if(isset($tohop) && $tohop == 'M01'){echo "selected";}?> value="M01">M01
                            </option>
                            <option <?php if(isset($tohop) && $tohop == 'M03'){echo "selected";}?> value="M03">M03
                            </option>
                        </select>
                    </div>
                    <?php
                        if($tohop == "Chọn"){ $uploadOk = 0 ?>
                    <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                    <?php }?>
                    <div class="col">
                        <label for="fphone">Điểm xét tuyển Đại học môn Toán:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="VD: Toán 9" name="diemxt"
                            value="<?php echo $diemxt ?>">
                        <?php
                        if($diemxt == ""){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                        <?php }?>
                    </div>
                    <div class="col">
                        <label for="fphone">Điểm xét tuyển Đại học môn Văn:<span class="star">*</span> </label>
                        <input type="text" class="form-control" placeholder="VD: Văn 7.5" name="diemxtv"
                            value="<?php echo $diemxtv ?>">
                        <?php
                        if($diemxt == ""){ $uploadOk = 0 ?>
                        <div style="color:red;"><?php echo "Chưa nhập thông tin !!!"?></div>
                        <?php }?>
                    </div>
                </div>
                <div class="btn-bottom">
                    <button type="submit" class="btn btn-primary">Gửi</button>
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
<?php
     if($uploadOk == 0){
    }else{
        include("../connect/connect.php");
        $sql_insert = "INSERT INTO  hoso (Id,Ho_Ten,Ngay_Sinh,Gioi_Tinh,Email,Dia_Chi,SDT,CCCD,Anh,Ban_Than,Uu_Tien, Khu_Vuc,Dot_Thi,Diemxt,Diem_Van,To_Hop) VALUES ($id,'$hoten','$ngaysinh','$gioitinh','$email','$diachi','$sdt','$cccd','$duongdanfile','$mota','$uutien','$khuvuc','$dotthi',$diemxt,$diemxtv,'$tohop') ";
        mysqli_query($conn, $sql_insert);
        echo "<script>alert('Đăng kí hồ sơ thành công !');</script>";
}
if($uploadOk == 0){
}else{
    foreach($file_names as $key => $val){
        $duongdanfiles = "http://localhost:81/web/doan/dangkihoso/ttxacthuc/" .$val;
        include("../connect/connect.php");
        $sql_inserts = "INSERT INTO  xacthuc (Id,Hinh_XacThuc) VALUES ($id,'$duongdanfiles')";
        mysqli_query($conn, $sql_inserts);
    }
    
}
?>
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