<?php
 session_start();
 // var_dump($_SESSION["user"]);
 if (!isset($_SESSION["user"])) {
     header("Location: ../login/login.php");
 };
    include "../connect/connect.php";
    $id = $_GET['id'];
    if($id > 0){
    $sql_delete = "DELETE FROM baithi WHERE Id= $id";
    $results = mysqli_query($conn, $sql_delete);
    $sql = "UPDATE login SET baithi = 0 WHERE Id = $id";
    mysqli_query($conn, $sql);
    header("location: ../quantri/quantribt.php");
    }
?>