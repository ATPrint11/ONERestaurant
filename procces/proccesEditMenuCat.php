<?php
    include "connect.php";
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
    $menutype = (isset($_POST['menutype'])) ? htmlentities($_POST['menutype']) : "";
    $menucat = (isset($_POST['menucat'])) ? htmlentities($_POST['menucat']) : "";

    if (!empty($_POST['inputMenuCatValidate'])) {
        $select = mysqli_query($conn, "SELECT * FROM tbcategorymenu WHERE category_menu = '$menucat'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Kategori yang dimasukkan telah ada");
            window.location="../menuCat" </script>';
        }else{
            $query = mysqli_query($conn, "UPDATE tbcategorymenu SET jenis_menu='$menutype', category_menu='$menucat' WHERE id_menu_cat='$id'");
        if ($query) {
            $message = '<script>alert("Data berhasil diupdate");
            window.location="../menuCat" </script>';
        }else{
            $message = '<script>alert("Data gagal diupdate");
            window.location="../menuCat" </script>';
        }
        }
    } echo $message;
?>