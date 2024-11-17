<?php
    include "connect.php";
    session_start();
    $codeorder = (isset($_POST['codeorder'])) ? htmlentities($_POST['codeorder']) : "";
    $tables = (isset($_POST['tables'])) ? htmlentities($_POST['tables']) : "";
    $customer = (isset($_POST['customer'])) ? htmlentities($_POST['customer']) : "";

    if (!empty($_POST['inputOrderValidate'])) {
        $select = mysqli_query($conn, "SELECT * FROM tborder WHERE id_order = '$codeorder'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Order yang dimasukkan telah ada");
            window.location="../order" </script>';
        }else{
            $query = mysqli_query($conn, "INSERT INTO tborder (id_order,tables,customer,waiter) values ('$codeorder','$tables','$customer','$_SESSION[idHeartcanteen]')");
        if (!$query) {
            $message = '<script>alert("Data gagal dimasukkan")</script>';
        }else{
            $message = '<script>alert("Data berhasil dimasukkan");
            window.location="../?x=orderItem&order='.$codeorder.'&tables='.$tables.'&customer='.$customer.'" </script>';
        }
        }
    } echo $message;
?>