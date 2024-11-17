<?php
include "procces/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tbUser");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            User Page
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Add User</button>
                </div>
            </div>
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="procces/proccesInputUser.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required>
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback">
                                                Please enter name.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatin
                                            gInput" placeholder="name@example.com" name="username" required>
                                            <label for="floatingInput">Username</label>
                                            <div class="invalid-feedback">
                                                Please enter username.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <div class="form-floating">
                                            <select class="form-select" aria-label="Default select example" name="level" required>
                                                <option selected hidden value="">Choose User Level</option>
                                                <option value="1">Owner/Admin</option>
                                                <option value="2">Kasir</option>
                                                <option value="3">Pelayan</option>
                                                <option value="4">Dapur</option>
                                            </select>
                                            <label for="floatingInput">Level User</label>
                                            <div class="invalid-feedback">
                                                Please choose level user.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <input type="number" inputmode="numeric" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx" name="nohp" required>
                                            <label for="floatingInput">No HP</label>
                                            <div class="invalid-feedback">
                                                Please enter no hp.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingInput" placeholder="Password" disabled value="12345678" name="password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="" cols="30" rows="10" style="height: 100px;" name="address"></textarea>
                                    <label for="floatingInput">Address</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="inputUserValidate" value="1234">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            foreach ($result as $row) {
            ?>

                <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="procces/proccesInputUser.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value="<?php echo $row['nama'] ?>">
                                                <label for="floatingInput">Nama</label>
                                                <div class="invalid-feedback">
                                                    Please enter name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="email" class="form-control" id="floatin
                                            gInput" placeholder="name@example.com" name="username" value="<?php echo $row['username'] ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Please enter username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 mb-3">
                                            <div class="form-floating">
                                                <select disabled class="form-select" aria-label="Default select example" required name="level" id="">
                                                    <?php
                                                    $data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['level'] == $key + 1) {
                                                            echo "<option selected value='$key'>$value</option>";
                                                        } else {
                                                            echo "<option value='$key'>$value</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingInput">Level User</label>
                                                <div class="invalid-feedback">
                                                    Please choose level user.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                                <label for="floatingInput">No HP</label>
                                                <div class="invalid-feedback">
                                                    Please enter no hp.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating">
                                        <textarea disabled class="form-control" id="" cols="30" rows="10" style="height: 100px;" name="address"><?php echo $row['address'] ?></textarea>
                                        <label for="floatingInput">Address</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="procces/proccesEditUser.php" method="post">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value="<?php echo $row['nama'] ?>">
                                                <label for="floatingInput">Nama</label>
                                                <div class="invalid-feedback">
                                                    Please enter name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input <?php echo ($row['username'] == $_SESSION['usernameHeartcanteen']) ? 'disabled' : '' ; ?> type="email" class="form-control" id="floatin
                                            gInput" placeholder="name@example.com" name="username" value="<?php echo $row['username'] ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Please enter username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 mb-3">
                                            <div class="form-floating">
                                                <select class="form-select" aria-label="Default select example" required name="level" id="">
                                                    <?php
                                                    $data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['level'] == $key + 1) {
                                                            echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                        } else {
                                                            echo "<option value=" . ($key + 1) . ">$value</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingInput">Level User</label>
                                                <div class="invalid-feedback">
                                                    Please choose level user.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                                <label for="floatingInput">No HP</label>
                                                <div class="invalid-feedback">
                                                    Please enter no hp.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating">
                                        <textarea class="form-control" id="" cols="30" rows="10" style="height: 100px;" name="address"><?php echo $row['address'] ?></textarea>
                                        <label for="floatingInput">Address</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="inputUserValidate" value="1234">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="procces/proccesDeleteUser.php" method="post">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="col-lg-12">
                                        <?php 
                                        if($row['username'] == $_SESSION['usernameHeartcanteen']){
                                            echo "<div class='alert alert-danger'>You cannot delete yourself</div>";
                                        }else{
                                            echo "Apakah anda yakin ingin menghapus user <b>$row[username]</b>";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="inputUserValidate" value="1234" <?php echo ($row['username'] == $_SESSION['usernameHeartcanteen']) ? 'disabled' : '' ; ?>>Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="procces/proccesResetPassword.php" method="post">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="col-lg-12">
                                        <?php 
                                        if($row['username'] == $_SESSION['usernameHeartcanteen']){
                                            echo "<div class='alert alert-danger'>You cannot reset your password</div>";
                                        }else{
                                            echo "Apakah anda yakin ingin mereset password user <b>$row[username]</b> menjadi password bawaan sistem yaitu  <b>password</b>";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="inputUserValidate" value="1234" <?php echo ($row['username'] == $_SESSION['usernameHeartcanteen']) ? 'disabled' : '' ; ?>>Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            if (empty($result)) {
                echo "Data user tidak ada";
            } else {
            ?>
                <div class="table-responsive mt-2">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Level</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php
                                        if ($row['level'] == 1) {
                                            echo "Admin";
                                        } elseif ($row['level'] == 2) {
                                            echo "Kasir";
                                        } elseif ($row['level'] == 3) {
                                            echo "Pelayan";
                                        } elseif ($row['level'] == 4) {
                                            echo "Dapur";
                                        }
                                        ?></td>
                                    <td><?php echo $row['nohp'] ?></td>
                                    <td class="d-flex">
                                        <button class="btn btn-info btn-sm me-3" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-warning btn-sm me-3" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-3" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?php echo $row['id'] ?>"><i class="bi bi-key-fill"></i></button>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>