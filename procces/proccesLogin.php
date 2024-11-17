<?php
    session_start();
    include "connect.php";
    $username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
    $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";
    if (!empty($_POST['submitValidate'])) {
        $query = mysqli_query($conn, "SELECT * FROM tbuser WHERE username = '$username' && password = '$password'");
        $hasil = mysqli_fetch_array($query);
        if ($hasil) {
            $_SESSION['usernameHeartcanteen'] = $username ;
            $_SESSION['levelHeartcanteen'] = $hasil['level'];
            $_SESSION['idHeartcanteen'] = $hasil['id'];
            header('location:../home');
        } else {
?>
<script>
    alert('wrong username or password');
    window.location='../login'
</script>
<?php
        }
    }
?>