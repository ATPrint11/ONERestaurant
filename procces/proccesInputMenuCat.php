<?php
    include "connect.php";
    $menutype = (isset($_POST['menutype'])) ? htmlentities($_POST['menutype']) : "";
    $menucat = (isset($_POST['menucat'])) ? htmlentities($_POST['menucat']) : "";
    
    if (!empty($_POST['inputMenuCatValidate'])) {
        $select = mysqli_query($conn, "SELECT category_menu FROM tbcategorymenu WHERE category_menu = '$menucat'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Kategori yang dimasukkan telah ada");
            window.location="../menuCat" </script>';
        }else{
            $query = mysqli_query($conn, "INSERT INTO tbcategorymenu (jenis_menu, category_menu) values ('$menutype', '$menucat')");
        if (!$query) {
            $message = '<script>alert("Data gagal dimasukkan");
            window.location="../menuCat" </script>';
        }else{
            $message = '<script>alert("Data berhasil dimasukkan");
            window.location="../menuCat" </script>';
        }
        }
    } echo $message;
?>