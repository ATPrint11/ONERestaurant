<?php
session_start();
    include "connect.php";
    $nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
    $nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
    $address = (isset($_POST['address'])) ? htmlentities($_POST['address']) : "";

    if (!empty($_POST['editProfileValidate'])) {
                $query = mysqli_query($conn, "UPDATE tbuser SET nama='$nama', nohp='$nohp', address='$addresdd' WHERE username = '$_SESSION[usernameHeartcanteen]'");
                if ($query) {
                    $message = '<script>alert("Profile data is successfully updated");
                    window.history.back()</script>';
                } else{
                    $message = '<script>alert("Profile data failed updated");
                    window.history.back()</script>';
                }
            }else{
                $message = '<script>alert("Error occurred");
                window.history.back()</script>';
            
            } echo $message;
?>