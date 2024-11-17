<?php
    include "connect.php";
    $codeorder = (isset($_POST['codeorder'])) ? htmlentities($_POST['codeorder']) : "";

    if (!empty($_POST['deleteOrderValidate'])) {
        $select =mysqli_query($conn, "SELECT code_order FROM tblistorder WHERE code_order='$codeorder'");
        if(mysqli_num_rows($select)>0){
            $message = '<script>alert("Data ini tidak bisa dihapus karena telah memiliki item order");
            window.location="../order" </script>';
        }else{
            $query = mysqli_query($conn, "DELETE FROM tborder WHERE id_order='$codeorder'");
            if ($query) {
                $message = '<script>alert("Data berhasil dihapus");
                window.location="../order" </script>';
            }else{
                $message = '<script>alert("Data gagal dihapus")</script>';
            }
        }
        } echo $message;
?>