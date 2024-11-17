<?php
    if (!isset($_SESSION['usernameHeartcanteen'])) {
        header('location:login');
    }
    
    include "procces/connect.php";
    $query = mysqli_query($conn, "SELECT * FROM tbuser WHERE username = '$_SESSION[usernameHeartcanteen]'");
    $hasil = mysqli_fetch_array($query);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ONE Restaurant</title>
    <link rel="icon" href="/images/assets/img/fakeCanteen.svg" type="image/svg+xml">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container-lg">
        <div class="row mb-5">
            <?php include "sidebar.php"; ?>
            <?php
            include $page;
            ?>
        </div>
    </div>
    <div class=" fixed-bottom text-center bg-light py-2">
        Elcyone1
    </div>
    
<script>
    // knjd
    (() => {
        'use strict'

        // abror ganteng
        const forms = document.querySelectorAll('.needs-validation')

        // gatau apa
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
<script>
    $(document).ready( function () {
    $('#example').DataTable();
} );
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>