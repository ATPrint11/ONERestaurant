<?php
    include "connect.php";
    session_start();
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
    $codeorder = (isset($_POST['codeorder'])) ? htmlentities($_POST['codeorder']) : "";
    $tables = (isset($_POST['tables'])) ? htmlentities($_POST['tables']) : "";
    $customer = (isset($_POST['customer'])) ? htmlentities($_POST['customer']) : "";
    $notes = (isset($_POST['notes'])) ? htmlentities($_POST['notes']) : "";
    $menu = (isset($_POST['menu'])) ? htmlentities($_POST['menu']) : "";
    $total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : "";

    if (!empty($_POST['editOrderItemValidate'])) {
        $select = mysqli_query($conn, "SELECT * FROM tblistorder WHERE menu='$menu' && code_order='$codeorder' && id_list_order!='$id'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Item yang dimasukkan telah ada");
            window.location="../?x=orderItem&order='.$codeorder.'&tables='.$tables.'&customer='.$customer.'" </script>';
        }else{
            $query = mysqli_query($conn, "UPDATE tblistorder SET menu='$menu',total='$total',notes='$notes' WHERE id_list_order='$id'");
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