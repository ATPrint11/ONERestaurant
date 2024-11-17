<?php
session_start();
    include "connect.php";
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
    $oldpassword = (isset($_POST['oldpassword'])) ? md5(htmlentities($_POST['oldpassword'])) : "";
    $newpassword = (isset($_POST['newpassword'])) ? md5(htmlentities($_POST['newpassword'])) : "";
    $renewpassword = (isset($_POST['renewpassword'])) ? md5(htmlentities($_POST['renewpassword'])) : "";

    if (!empty($_POST['editPasswordValidate'])) {
        $query = mysqli_query($conn, "SELECT * FROM tbuser WHERE username = '$_SESSION[usernameHeartcanteen]' && password = '$oldpassword'");
        $hasil = mysqli_fetch_array($query);
        if ($hasil) {
            if($newpassword == $renewpassword){
                $query = mysqli_query($conn, "UPDATE tbuser SET password='$newpassword' WHERE username = '$_SESSION[usernameHeartcanteen]'");
                if ($query) {
                    $message = '<script>alert("New password changed");
                    window.history.back()</script>';
                }else{
                    $message = '<script>alert("New password unchanged");
                    window.history.back()</script>';
                }
            } else {
                $message = '<script>alert("New password invalid");
                    window.history.back()</script>';
            }
            
        } else {
            $message = '<script>alert("Old password invalid");
                    window.history.back()</script>';
        }
    }else {
            header('location:../home');
        }echo $message;
?>