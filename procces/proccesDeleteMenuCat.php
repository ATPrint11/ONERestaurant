<?php
    include "connect.php";
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

    if (!empty($_POST['inputMenuCatValidate'])) {
        $query = mysqli_query($conn, "DELETE FROM tbcategorymenu WHERE id_menu_cat='$id'");
        if ($query) {
            $message = '<script>alert("Data berhasil dihapus");
            window.location="../menuCat" </script>';
        }else{
            $message = '<script>alert("Data gagal dihapus");
            window.location="../menuCat" </script>';
        }
    } echo $message;
?>