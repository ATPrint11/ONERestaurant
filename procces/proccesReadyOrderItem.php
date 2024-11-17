<?php
    include "connect.php";
    session_start();
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
    $notes = (isset($_POST['notes'])) ? htmlentities($_POST['notes']) : "";

    if (!empty($_POST['readyOrderItemValidate'])) {
            $query = mysqli_query($conn, "UPDATE tblistorder SET notes='$notes', status=2 WHERE id_list_order='$id'");
        if (!$query) {
            $message = '<script>alert("Failed to process data");
            window.location="../kitchen" </script>';
        }else{
            $message = '<script>alert("Order ready to serve");
            window.location="../kitchen" </script>';
        }
    } echo $message;
?>