<?php
    include "connect.php";
    session_start();
    $codeorder = (isset($_POST['codeorder'])) ? htmlentities($_POST['codeorder']) : "";
    $tables = (isset($_POST['tables'])) ? htmlentities($_POST['tables']) : "";
    $customer = (isset($_POST['customer'])) ? htmlentities($_POST['customer']) : "";
    $notes = (isset($_POST['notes'])) ? htmlentities($_POST['notes']) : "";
    $menu = (isset($_POST['menu'])) ? htmlentities($_POST['menu']) : "";
    $total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : "";

    if (!empty($_POST['inputOrderItemValidate'])) {
        $select = mysqli_query($conn, "SELECT * FROM tblistorder WHERE menu='$menu' && code_order='$codeorder'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Item yang dimasukkan telah ada");
            window.location="../?x=orderItem&order='.$codeorder.'&tables='.$tables.'&customer='.$customer.'" </script>';
        }else{
            $query = mysqli_query($conn, "INSERT INTO tblistorder (menu,code_order,total,notes) values ('$menu','$codeorder','$total','$notes')");
        if (!$query) {
            $message = '<script>alert("Data gagal dimasukkan");
            window.location="../?x=orderItem&order='.$codeorder.'&tables='.$tables.'&customer='.$customer.'" </script>';
        }else{
            $message = '<script>alert("Data berhasil dimasukkan");
            window.location="../?x=orderItem&order='.$codeorder.'&tables='.$tables.'&customer='.$customer.'" </script>';
        }
        }
    } echo $message;
?>