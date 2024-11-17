<?php
    include "connect.php";
    session_start();
    $codeorder = (isset($_POST['codeorder'])) ? htmlentities($_POST['codeorder']) : "";
    $tables = (isset($_POST['tables'])) ? htmlentities($_POST['tables']) : "";
    $customer = (isset($_POST['customer'])) ? htmlentities($_POST['customer']) : "";
    $total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : "";
    $money = (isset($_POST['money'])) ? htmlentities($_POST['money']) : "";
    $returns = $money - $total;

    if (!empty($_POST['buyValidate'])) {
        if($returns<0){
            $message = '<script>alert("Insufficient amount of money");
            window.location="../?x=orderItem&order='.$codeorder.'&tables='.$tables.'&customer='.$customer.'" </script>';
        }else{
            $query = mysqli_query($conn, "INSERT INTO tbbuy (id_buy,amount_money,total_payment) values ('$codeorder','$money','$total')");
            if (!$query) {
                $message = '<script>alert("Failed payment");
                window.location="../?x=orderItem&order='.$codeorder.'&tables='.$tables.'&customer='.$customer.'" </script>';
            }else{
                $message = '<script>alert("Successful payment \n Change Rp. '.$returns.'");
                window.location="../?x=orderItem&order='.$codeorder.'&tables='.$tables.'&customer='.$customer.'" </script>';
            }
        }
    } echo $message;
?>