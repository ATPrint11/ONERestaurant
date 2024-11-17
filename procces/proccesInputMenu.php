<?php
    include "connect.php";
    $menu_name = (isset($_POST['menu_name'])) ? htmlentities($_POST['menu_name']) : "";
    $information = (isset($_POST['information'])) ? htmlentities($_POST['information']) : "";
    $price = (isset($_POST['price'])) ? htmlentities($_POST['price']) : "";
    $stock = (isset($_POST['stock'])) ? htmlentities($_POST['stock']) : "";
    $menu_cat = (isset($_POST['category'])) ? htmlentities($_POST['category']) : "";

    $code_rand = rand(10000,99999)."-";
    $target_dir = "../assets/img/".$code_rand;
    $target_file = $target_dir.basename($_FILES['foto']['name']);
    $imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!empty($_POST['inputMenuValidate'])) {
        $cek = getimagesize($_FILES['foto']['tmp_name']);
        if($cek === false){
            $message = "Its not a img file";
            $statusUpload = 0;
        }else{
            $statusUpload = 1;
            if(file_exists($target_file)){
                $message = "Sorry, the file already exist";
                $statusUpload = 0;
            }else{
                if($_FILES['foto']['size'] > 500000){
                    $message = "File size to big";
                    $statusUpload = 0;
                }else{
                    if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif"){
                        $message = "Sorry, JPG, PNG, JPEG, and GIF only allowed";
                        $statusUpload = 0;
                    }
                }
            }
        }

        if($statusUpload == 0){
            $message = '<script>alert("'.$message.', Gambar tidak dapat diupload");
            window.location="../menu"</script>';
        }else{
            $select = mysqli_query($conn, "SELECT * FROM tbmenulist WHERE menu_name = '$menu_name'");
            if (mysqli_num_rows($select) > 0) {
                $message = '<script>alert("Nama menu yang dimasukkan telah ada");
            window.location="../menu" </script>';
            }else{
                if(move_uploaded_file($_FILES['foto']['tmp_name'],$target_file)){
                    $query = mysqli_query($conn, "INSERT INTO tbmenulist (photo, menu_name, information, price, stock, category) values ('" . $code_rand . $_FILES['foto']['name'] . "','$menu_name','$information','$price','$stock','$menu_cat')");
                if ($query) {
                    $message = '<script>alert("Data berhasil dimasukkan");
                                window.location="../menu"</script>';
                }else{
                    $message = '<script>alert("Data gagal dimasukkan");
                                window.location="../menu"</script>';
                }
                }else{
                    $message = '<script>alert("Maaf, terjadi kesalahan file tidak dapat diupload");
                                window.location="../menu"</script>';
                }
            }
        }
    } echo $message;
?>