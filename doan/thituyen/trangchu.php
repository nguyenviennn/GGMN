<?php
    session_start();
    if(isset($_GET["id"])){
        $_SESSION["id"] = $_GET['id'];
    }else{
        $_SESSION["id"] = '';
    }
    $id = $_SESSION["id"];
  include "../connect/connect.php";
  global $conn;
  $sql_select ="SELECT * FROM tintuc LIMIT 3";
  $tt = mysqli_query($conn,$sql_select);
  if(isset($_SESSION['xths'])){
    echo $_SESSION['xths'];
    unset($_SESSION["xttt"]);
}
    unset($_SESSION["xths"]);

  if(isset($_SESSION['xttt'])){
    echo $_SESSION['xttt'];
}
    unset($_SESSION["xttt"]);
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
    <link rel="stylesheet" href="thituyenmn.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="menu.css">
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
        <section class="banner">
            <div class="img-banner">
                <img src="https://png.pngtree.com/thumb_back/fw800/back_our/20190617/ourmid/pngtree-admissions-education-early-childhood-training-poster-banner-image_127997.jpg"
                    alt="">
                <p>Thi năng khiếu ngành giáo dục mầm non </p>
            </div>
        </section>
        <section class="body-web">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2>Hướng dẫn đăng kí thi năng khiếu ngành Giáo dục mầm non</h2>
                        <div class="content">
                            <b>I. Chuẩn bị trước khi thi</b>
                            <p>- Nhà trường thông báo kế hoạch, chỉ tiêu tuyển sinh, điều kiện nộp hồ sơ ngành Giáo dục
                                mầm non lên các phương tiện thông tin đại chúng. </p>
                            <p> - Thí sinh nộp hồ sơ đăng ký dự thi: Trực tiếp hoặc gián tiếp (Qua bưu điện, chụp ảnh hồ
                                sơ
                                gửi qua form đăng ký trực tuyến). Hồ sơ gồm:</p>
                            <p class="ghichu"> + Học bạ (bản sao)</p>
                            <p class="ghichu"> + Giấy CMND, căn cước công dân</p>
                            <p class="ghichu"> + Chứng nhận ưu tiên</p>
                            <p class="ghichu"> + Phiếu đăng ký dự thi</p>
                            <p class="ghichu"> + Lệ phí đăng ký sơ tuyển</p>
                            <p class="ghichu"> + Ảnh chân dung</p>
                            <p class="ghichu"> + Chứng nhận tốt nghiệp/bằng tốt nghiệp THPT (nếu có)</p>
                            <p>- Nhà trường xét hồ sơ, lập danh sách thí sinh dự thi năng khiếu</p>
                            <b>II. Hình thức tổ chức thi</b>
                            <p>- Nhà trường gửi thông báo (kế hoạch) về đợt thi tuyển năng khiếu qua email, nhóm Zalo
                                hoặc điện thoại thí sinh sau khi đăng kí</p>
                            <p class="ghichu"> + Nhà trường tổ chức các buổi hướng dẫn thi năng khiếu và tập huấn kỹ
                                năng làm bài năng khiếu 1, năng khiếu 2 cho thí sinh bằng hình thức online qua Zoom.</p>
                            <p class="ghichu"> + Thí sinh chuẩn bị các nội dung theo hướng dẫn: Quay video clip các nội
                                dung của bài thi năng khiếu: Năng khiếu 1 (hát), năng khiếu 2 (đọc kế diễn cảm)</p>
                            <p class="ghichu"> + Gửi bài thi và các thông tin cá nhân lên Google Form cho bộ phận tuyển
                                sinh và chờ kết quả thi</p>
                            <b>III. Phương thức lưu chữ bài thi và chấm điểm</b>
                            <p>- Nhà trường chấm thi sau khi kết thúc quá tổng hợp bài thi của thí sinh</p>
                            <p class="ghichu"> + Cán bộ kỹ thuật sẽ tổng hợp được vài thi thí sinh gửi trên hệ thống
                            </p>
                            <p class="ghichu"> + Tổ chức cho giảng viên chấm thi năng khiếu</p>
                            <p class="ghichu"> + Chờ đến khi thí sinh đã tốt nghiệp THPT, sẽ lập kết quả xét tuyển của
                                thí sinh gồm: Điểm môn Toán + Năng khiếu 1+ Năng khiếu 2(M01) hoặc điểm môn Văn + năng
                                khiếu 1 + năng khiếu 2(M03). Các điểm ưu tiên,
                                khuyến khích( Điểm ưu tiên sẽ được cộng sau khi thống nhất từ hội đồng chấm thi)</p>
                            <p class="ghichu"> + Khi có thông báo điểm sàn (ngưỡng đảm báo chất lượng đầu vào), Nhà
                                trường sẽ thông báo điểm trúng tuyển và gửi thông báo trúng tuyển cho thí sinh lên
                                website và gửi giấy báo nhập học qua đường bưu điện.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php while ($news = mysqli_fetch_array($tt)){?>
                        <div class="item-item">
                            <div class="img-item">
                                <img src="http://cdsptw.edu.vn/userfiles/image/2022/hc1.jpg" alt="">
                            </div>
                            <div class="item-bot">
                                <a href="../chitiettintuc/chitiettintuc.php?id=<?php echo $_SESSION['id'] ?>">
                                    <h3>
                                        <?php echo $news['Ten_Tin']; ?>
                                    </h3>
                                </a>
                                <div class="bot">
                                    <div class="date">
                                        <span><i class="fas fa-gift"></i> <?php echo date("d/m/Y",strtotime($news['Thoi_Gan']));?></</span>
                                                </div> <div class="btn-more">
                                            <a
                                                href="../chitiettintuc/chitiettintuc.php?id=<?php echo $_SESSION['id'] ?>"><span>Xem
                                                    thêm <i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
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
        <div class="btn-scroll">
            <button id="btn-scroll"><i class="fas fa-chevron-up"></i></button>
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
    
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
<script src="thituyenmn.js"></script>

</html>