<?php
 session_start();
 // var_dump($_SESSION["user"]);
 if (!isset($_SESSION["user"])) {
     header("Location: ../login/login.php");
 };
    include "../connect/connect.php";
    $id = $_GET['id'];
    if($id > 0){
    $sql_delete = "DELETE FROM hotro WHERE Id_Hotro= $id";
    $results = mysqli_query($conn, $sql_delete);
    header("location: ../quantri/quantrich.php");
    }
?>