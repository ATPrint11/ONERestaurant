<?php
    include "connect.php";
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

    if (!empty($_POST['inputUserValidate'])) {
        $query = mysqli_query($conn, "DELETE FROM tbuser WHERE id='$id'");
        if ($query) {
            $message = '<script>alert("Data berhasil dihapus");
            window.location="../user" </script>';
        }else{
            $message = '<script>alert("Data gagal dihapus")</script>';
        }
    } echo $message;
?>