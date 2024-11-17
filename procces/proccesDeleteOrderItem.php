<?php
    include "connect.php";
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
    $codeorder = (isset($_POST['codeorder'])) ? htmlentities($_POST['codeorder']) : "";
    $tables = (isset($_POST['tables'])) ? htmlentities($_POST['tables']) : "";
    $customer = (isset($_POST['customer'])) ? htmlentities($_POST['customer']) : "";

    if (!empty($_POST['deleteOrderItemValidate'])) {
            $query = mysqli_query($conn, "DELETE FROM tblistorder WHERE id_list_order='$id'");
            if ($query) {
                $message = '<script>alert("Data berhasil dihapus");
                window.location="../?x=orderItem&order='.$codeorder.'&tables='.$tables.'&customer='.$customer.'" </script>';
            }else{
                $message = '<script>alert("Data gagal dihapus");
                window.location="../?x=orderItem&order='.$codeorder.'&tables='.$tables.'&customer='.$customer.'" </script>';
            }
        } echo $message;
?>