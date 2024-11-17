<?php
    include "connect.php";
    session_start();
    $id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
    $notes = (isset($_POST['notes'])) ? htmlentities($_POST['notes']) : "";

    if (!empty($_POST['acceptOrderItemValidate'])) {
            $query = mysqli_query($conn, "UPDATE tblistorder SET notes='$notes', status=1 WHERE id_list_order='$id'");
        if (!$query) {
            $message = '<script>alert("Failed to received an order from the kitchen");
            window.location="../kitchen" </script>';
        }else{
            $message = '<script>alert("Successfully received an order from the kitchen");
            window.location="../kitchen" </script>';
        }
    } echo $message;
?>