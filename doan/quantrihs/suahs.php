<?php
    session_start();
    // var_dump($_SESSION["user"]);
    if (!isset($_SESSION["user"])) {
        header("Location: ../login/login.php");
    };
    $thongbao = "";
     $id = $_GET['id'];
    // echo htmlspecialchars($_SERVER["PHP_SELF"]);
    include "../connect/connect.php";
    $cc="SELECT * FROM hoso WHERE Id = '$id'";
    global $conn;   
    $x=mysqli_query($conn, $cc);
    $row = $x->fetch_assoc();

    $hoten = (isset($_POST['hoten']) ? $_POST['hoten'] :"");
    $sdt = (isset($_POST['sdt']) ? $_POST['sdt'] :"");
    $cccd = (isset($_POST['cccd']) ? $_POST['cccd'] :"");
    $ngaysinh = (isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] :"");
    $email = (isset($_POST['email']) ? $_POST['email'] :"");
    $diachi = (isset($_POST['diachi']) ? $_POST['diachi'] :"");
    $mota = (isset($_POST['mota']) ? $_POST['mota'] :"");
    $uutien = (isset($_POST['uutien']) ? $_POST['uutien'] :"");
    $khuvuc = (isset($_POST['khuvuc']) ? $_POST['khuvuc'] :"");
    $dotthi = (isset($_POST['dotthi']) ? $_POST['dotthi'] :"");
    $diemthit = (isset($_POST['diemxt']) ? $_POST['diemxt'] :"");
    $diemthiv = (isset($_POST['diemxtv']) ? $_POST['diemxtv']:"");
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

    <title>Sửa thông tin hồ sơ</title>
</head>

<body>
    <section class="container">
        <div class="form-dangki">
            <h2>Sửa thông tin thí sinh</h2>
            <form action="guihs.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data"
                role="form">
                <?php
                    if($thongbao != ""){ ?>
                <div style="color:red;"><?php echo $thongbao; ?></div>
                <?php }?>
                <p>1. Thông tin cá nhân: </p>
                <div class="row">
                    <div class="col">
                        <label for="fname">Họ Tên: </label>
                        <input type="text" class="form-control" placeholder="Nhập họ tên" name="hoten" value="<?php echo $row['Ho_Ten']?>">
                    </div>
                    <div class="col">
                        <label for="fphone">Số điện thoại: </label>
                        <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="sdt" value="<?php echo $row['SDT']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="fphone">CMT/CCCD: </label>
                        <input type="text" class="form-control" placeholder="Nhập số thẻ căn cước" name="cccd" value="<?php echo $row['CCCD']?>">
                    </div>
                    <div class="col">
                        <label for="fphone">Ngày sinh: </label>
                        <input type="date" class="form-control" placeholder="Nhập ngày sinh" name="ngaysinh" value="<?php echo $row['Ngay_Sinh']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="fphone">Email: </label>
                        <input type="text" class="form-control" placeholder="Nhập Email" name="email" value="<?php echo $row['Email']?>">
                    </div>
                    <div class="col">
                        <label for="fphone">Địa chỉ: </label>
                        <input type="text" class="form-control" placeholder="Nhập nơi ở hiện tại" name="diachi" value="<?php echo $row['Dia_Chi']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="gioi-tinh" for="fgioitinh">Giới tính: </label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1"
                                <?php if($row['Gioi_Tinh'] == 'Nam')  echo "checked = 'checked'"?>
                                name="gioitinh" value="Nam" >
                            <label class="form-check-label" for="inlineCheckbox1" name="gioitinh">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2"
                                <?php if($row['Gioi_Tinh'] == 'Nữ')  echo "checked = 'checked'"?>
                                name="gioitinh" value="Nữ">
                            <label class="form-check-label" for="inlineCheckbox2" name="gioitinh">Nữ</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ảnh: </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anh">
                        </div>
                        <img style="width:100px" src="<?php echo $row['Anh']?>" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mô tả bản thân:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="mota" ><?php echo $row['Ban_Than']?></textarea>
                        </div>
                    </div>
                </div>
                <p>2.Thông tin thi tuyển tuyển: </p>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="inputAddress">Đối tượng ưu tiên: </label>
                            <input type="text" class="form-control" id="inputAddress"
                                placeholder="VD: Gia đình thuộc diện hộ nghèo" name="uutien" value="<?php echo $row['Uu_Tien']?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="fphone">Khu vực thi tuyển: </label>
                        <input type="text" class="form-control" placeholder="Miền Bắc" name="khuvuc" value="<?php echo $row['Khu_Vuc']?>">
                    </div>
                    <div class="col">
                        <label for="fphone">Đợt thi tuyển: </label>
                        <input type="text" class="form-control" placeholder="VD:1,2,3,..." name="dotthi" value="<?php echo $row['Dot_Thi']?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="fphone">Điểm xét tuyển mon Toán: </label>
                        <input type="text" class="form-control" placeholder="Miền Bắc" name="diemxt" value="<?php echo $row['Diemxt']?>">
                    </div>
                    <div class="col">
                        <label for="fphone">Điểm xét tuyển môn Văn: </label>
                        <input type="text" class="form-control" placeholder="Miền Bắc" name="diemxtv" value="<?php echo $row['Diem_Van']?>">
                    </div>
                </div>
                <br>
                <div class="btn-bottom">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>

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