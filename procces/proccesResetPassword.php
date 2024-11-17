<?php
    include "connect.php";
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

    if (!empty($_POST['inputUserValidate'])) {
        $query = mysqli_query($conn, "UPDATE tbuser SET password=md5('password') WHERE id='$id'");
        if ($query) {
            $message = '<script>alert("Reset password success");
            window.location="../user" </script>';
        }else{
            $message = '<script>alert("Reset password unsuccess")</script>';
        }
    } echo $message;
?>