<?php
include "procces/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tbcategorymenu");
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
            Menu Category Page
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Add Category</button>
                </div>
            </div>
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Menu Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="procces/proccesInputMenuCat.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="menutype" id="" required>
                                                <option value="1">Makanan</option>
                                                <option value="2">Minuman</option>
                                            </select>
                                            <label for="floatingInput">Menu Type</label>
                                            <div class="invalid-feedback">
                                                Please enter menu type.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatin
                                            gInput" placeholder="Menu Category" name="menucat" required>
                                            <label for="floatingInput">Menu Category</label>
                                            <div class="invalid-feedback">
                                                Please enter menu category.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="inputMenuCatValidate" value="1234">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            foreach ($result as $row) {
            ?>

                <div class="modal fade" id="ModalEdit<?php echo $row['id_menu_cat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Menu Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="procces/proccesEditMenuCat.php" method="post">
                                    <input type="hidden" value="<?php echo $row['id_menu_cat'] ?>" name="id">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                            <select class="form-select" name="menutype" id="">
                                                <option value="1">Makanan</option>
                                                <option value="2">Minuman</option>
                                            </select>
                                                <label for="floatingInput">Menu Type</label>
                                                <div class="invalid-feedback">
                                                    Please enter menu type.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input <?php echo ($row['category_menu'] == $_SESSION['usernameHeartcanteen']) ? 'disabled' : '' ; ?> type="text" class="form-control" id="floatin
                                            gInput" placeholder="Menu Category" name="menucat" value="<?php echo $row['category_menu'] ?>">
                                                <label for="floatingInput">Username</label>
                                                <div class="invalid-feedback">
                                                    Please enter username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="inputMenuCatValidate" value="1234">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="ModalDelete<?php echo $row['id_menu_cat'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Menu Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="procces/proccesDeleteMenuCat.php" method="post">
                                    <input type="hidden" value="<?php echo $row['id_menu_cat'] ?>" name="id">
                                    <div class="col-lg-12">
                                        <?php 
                                        if($row['category_menu'] == $_SESSION['usernameHeartcanteen']){
                                            echo "<div class='alert alert-danger'>You cannot delete yourself</div>";
                                        }else{
                                            echo "Apakah anda yakin ingin menghapus kategori menu <b>$row[category_menu]</b>";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="inputMenuCatValidate" value="1234" <?php echo ($row['category_menu'] == $_SESSION['usernameHeartcanteen']) ? 'disabled' : '' ; ?>>Delete</button>
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Menu Type</th>
                                <th scope="col">Menu Category</th>
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
                                    <td><?php echo ($row['jenis_menu']==1 ? "Makanan" : "Minuman") ?></td>
                                    <td><?php echo $row['category_menu'] ?></td>
                                    <td class="d-flex">
                                        <button class="btn btn-warning btn-sm me-3" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_menu_cat'] ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-3" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_menu_cat'] ?>"><i class="bi bi-trash"></i></button>
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