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
  $sql_select ="SELECT * FROM tintuc LIMIT 3";
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
    <link rel="stylesheet" href="../thituyen/footer.css">
    <link rel="stylesheet" href="../thituyen/menu.css">
    <link rel="stylesheet" href="../thituyen/thituyenmn.css">
    <link rel="stylesheet" href="../chitiettintuc/chitiettintuc.css">
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
                        <li><a href="../thituyen/trangchu.php?id=<?php echo $_SESSION['id'] ?>"><i class="fas fa-home"></i> Trang
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
        <section class="body-web">
            <div class="container">
                <div class="row">
                    <div class="link" style="margin-left:0px;">
                        <a href="../thituyen/trangchu.php">Trang chủ </a><span> > </span><a
                            href="../chitiettintuc/chitiettintuc.html"> Tin tức</a>
                        <div class="text">
                            <p>Tin tức</p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h2>Hội đồng nghiệm thu kho học liệu “Giáo dục hành vi bảo vệ môi trường cho trẻ mầm non” tại
                            Trường Cao đẳng Sư phạm Trung ương</h2>
                        <div class="content">
                            <p>Giáo dục bảo vệ môi trường là giáo dục về cuộc sống, về phát triển bền vững và lối sống
                                bền vững. Hiện nay, tình trạng ô nhiễm môi trường, ô nhiễm không khí và rác thải nhựa
                                cùng với các biện pháp giảm thiểu ô nhiễm đang đặt ra cấp bách, giáo dục bảo vệ môi
                                trường càng trở nên cấp thiết. Một trong những nhiệm vụ quan trọng góp phần vào việc
                                giải quyết các vấn đề cấp bách về môi trường là tìm kiếm các biện pháp, xây dựng các kho
                                học liệu hỗ trợ giáo viên để nâng cao hiệu quả giáo dục bảo vệ môi trường cho trẻ em
                                ngay từ độ tuổi mầm non.</p>
                            <p>Trong những năm qua, trường Cao đẳng Sư phạm Trung ương (CĐSPTW) đã nhận được sự hợp tác,
                                hỗ trợ rất lớn của Tổ chức UNICEF trong việc nghiên cứu biên soạn tài liệu nâng cao chất
                                lượng giáo dục trẻ mầm non. Năm 2021, Trường Cao đẳng Sư phạm Trung ương tiếp tục phối
                                hợp Tổ chức UNICEF biên soạn Kho học liệu “Giáo dục hành vi bảo vệ môi trường cho trẻ
                                mầm non”.</p>
                            <img src="http://cdsptw.edu.vn/userfiles/image/2022/0012.jpg" alt="Giáo dục mầm non">
                            <p>Chiều 27/4/20222, tại phòng Phòng Giao ban Trường CĐSPTW đã diễn ra Hội đồng nghiệm thu
                                kho học liệu “Giáo dục hành vi bảo vệ môi trường cho trẻ mầm non”. Tham dự Hội đồng
                                nghiệm thu có Bà Lê Anh Lan và Bà Hồ Trần Thanh Huyền đại diện Tổ chức UNICEF.</p>
                            <img src="http://cdsptw.edu.vn/userfiles/image/2022/0022.jpg" alt="">
                            <p>TS. Nguyễn Thị Xuân thay mặt nhóm tác giả đã trình bày cấu trúc chung của 5 tài liệu
                                thuộc kho học liệu “Giáo dục hành vi bảo vệ môi trường cho trẻ mầm non”.</p>
                            <img src="http://cdsptw.edu.vn/userfiles/image/2022/0042.jpg" alt="">
                            <p>Hội đồng lắng nghe ý kiến góp ý của PGS.TS Bùi Thị Lâm, Trưởng Khoa Giáo dục Mầm non -
                                Trường Đại học Sư phạm Hà Nội; ThS. Đinh Thị Bích Thủy - Phó trưởng phòng Giáo dục Mầm
                                non - Sở Giáo dục và Đào tạo Hà Nội, TS. Trịnh Thị Xim - Phó Bí thư Đảng ủy, Phó Hiệu
                                trưởng Trường CĐSPTW; TS. Nguyễn Thị Hạnh - Đại học Thủ Đô Hà Nội, ThS. Vũ Huyền Trinh -
                                Vụ Giáo dục Mầm non - Bộ Giáo dục và Đào tạo. Hầu hết tất cả các ý kiến đánh giá cao kho
                                học liệu, các sản phẩm đảm bảo tính khoa học, giải quyết được các mục đích nghiên cứu,
                                có ý nghĩa và giá trị thực tiễn cao khi đưa vào sử dụng để nâng cao chất lượng, hiệu quả
                                trong công tác chăm sóc, giáo dục trẻ hành vi bảo vệ môi trường.</p>
                            <img src="http://cdsptw.edu.vn/userfiles/image/2022/0061.jpg" alt="">
                            <p>Bên cạnh đó, các thành viên Hội đồng đề nghị nhóm tác giả tiếp tục chỉnh sửa nội dung và
                                có thêm hướng dẫn cụ thể để giáo viên mầm non có thể vận dụng các nội dung của kho học
                                liệu trong việc xây dựng kế hoạch giảng dạy. Theo Vụ Giáo dục Mầm non - Bộ Giáo dục và
                                Đào tạo, nếu kho học liệu được công khai và sử dụng rộng rãi, giáo viên mầm non sẽ có cơ
                                hội tiếp cận và nâng cao trình độ chuyên môn.</p>
                            <img src="http://cdsptw.edu.vn/userfiles/image/2022/0070.jpg" alt="">
                            <p>Đại diện cho Tổ chức UINCEF - Bà Lê Anh Lan phát biểu và đánh giá cao sự hợp tác trong
                                những năm qua giữa Trường CĐPTW và Tổ chức UNICEF, đồng thời đánh giá cao nhóm tác giả
                                trong điều kiện dịch bệnh Covid -19 đã rất nỗ lực, trách nhiệm hoàn thành kho học liệu
                                có giá trị khoa học và ý nghĩa thực tiễn sâu sắc. Bên cạnh đó, bà Lê Anh Lan cũng đề
                                nghị nhóm tác giả tiếp tục chỉnh sửa để kho học liệu hoàn thiện hơn và đưa vào sử dụng
                                rộng rãi, là nguồn tham khảo có ý nghĩa cho giáo viên mầm non. Trong những năm tiếp
                                theo, tổ chức UINCEF sẽ tiếp tục phối hợp chặt chẽ với nhà trường để thúc đầy các dự án
                                chất lượng, hướng tới nâng cao chăm sóc, giáo dục trẻ em.</p>
                            <img src="http://cdsptw.edu.vn/userfiles/image/2022/0080.jpg" alt="">
                            <p>Thay mặt nhóm tác giả, TS. Nguyễn Thị Xuân cảm ơn Lãnh đạo Nhà trường, Tổ chức UINCEF và
                                các thành viên Hội đồng đã tạo điều kiện, hỗ trợ, hướng dẫn và góp ý sâu sắc cho nhóm
                                tác giả. Nhóm tác giả nghiêm túc tiếp thu ý kiến và chỉnh sửa kịp thời để kho học liệu
                                sớm được đưa vào sử dụng.</p>
                            <img src="http://cdsptw.edu.vn/userfiles/image/2022/009.jpg" alt="">
                            <p>PGS. TS Trần Đình Tuấn đã cam kết các nguồn tài liệu này sẽ được công khai rộng rãi trên
                                Website Nhà trường, sẵn sàng chia sẻ cho các cơ quan chức năng, các Trường để sản phẩm có ý
                                nghĩa này được sử dụng có hiệu quả trong công tác đào tạo và nâng cao chất lượng giáo dục
                                trẻ mầm non.</p>
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
                                            <span><i class="fas fa-gift"></i> <?php echo $news['Thoi_Gan']; ?></</span>
                                                    </div> <div class="btn-more">
                                                    <a href="../chitiettintuc/chitiettintuc.php?id=<?php echo $_SESSION['id'] ?>"><span>Xem thêm<i class="fa fa-angle-right" aria-hidden="true"></i></span></a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="../thituyen/thituyenmn.js"></script>
</html>