<?php
    include "connect.php";
    session_start();
    $codeorder = (isset($_POST['codeorder'])) ? htmlentities($_POST['codeorder']) : "";
    $tables = (isset($_POST['tables'])) ? htmlentities($_POST['tables']) : "";
    $customer = (isset($_POST['customer'])) ? htmlentities($_POST['customer']) : "";

    if (!empty($_POST['editOrderValidate'])) {
            $query = mysqli_query($conn, "UPDATE tborder SET tables='$tables',customer='$customer' WHERE id_order='$codeorder'");
        if (!$query) {
            $message = '<script>alert("Data gagal dimasukkan")</script>';
        }else{
            $message = '<script>alert("Data berhasil diupdate");
            window.location="../order" </script>';
        }
    } echo $message;
?>