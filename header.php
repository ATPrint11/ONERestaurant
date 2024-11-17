<?php 
    include "procces/connect.php";
    $query = mysqli_query($conn, "SELECT * FROM tbuser WHERE username='$_SESSION[usernameHeartcanteen]'");
    $records = mysqli_fetch_array($query);
?>
<nav class="navbar navbar-expand bg-primary navbar-dark sticky-top">
    <div class="container-lg">
        <a class="navbar-brand" href="#"><i class="bi bi-arrow-through-heart"></i> ONE Restaurant</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                            echo $hasil['username'];
                        ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalChangeProfile"><i class="bi bi-person-circle"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalChangePassword"><i class="bi bi-key-fill"></i> Change Password</a></li>
                        <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="ModalChangePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="procces/proccesEditPassword.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="email" class="form-control" id="floatin
                                            gInput" placeholder="name@example.com" name="username" value="<?php echo $_SESSION['usernameHeartcanteen'] ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Please enter username.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="floatin
                                            gPassword" name="oldpassword" required>
                                                <label for="floatingInput">Old Password</label>
                                                <div class="invalid-feedback">
                                                    Please enter old password.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="floatin
                                            gInput" name="newpassword" required>
                                                <label for="floatingInput">New Password</label>
                                                <div class="invalid-feedback">
                                                    Please enter new password.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                                <input type="password" class="form-control" id="floatin
                                            gPassword" name="renewpassword" required>
                                                <label for="floatingInput">New Password</label>
                                                <div class="invalid-feedback">
                                                    Please reenter your new password.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="editPasswordValidate" value="1234">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalChangeProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="procces/profile.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input disabled type="email" class="form-control" id="floatin
                                            gInput" placeholder="name@example.com" name="username" value="<?php echo $_SESSION['usernameHeartcanteen'] ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Please enter username.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingName" name="nama" value="<?php echo $records['nama'] ?>" required>
                                                <label for="floatingInput">Name</label>
                                                <div class="invalid-feedback">
                                                    Please enter your name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" name="nohp" value="<?php echo $records['nohp'] ?>" required>
                                                <label for="floatingInput">No Hp</label>
                                                <div class="invalid-feedback">
                                                    Please enter your handphone number.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="" cols="30" rows="10" style="height: 100px;" name="address"><?php echo $records['address'] ?></textarea>
                                                <label for="floatingInput">Address</label>
                                                <div class="invalid-feedback">
                                                        Please enter your address.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="editProfileValidate" value="1234">Change Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>