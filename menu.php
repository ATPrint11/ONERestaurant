<?php
include "procces/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tbmenulist LEFT JOIN tbcategorymenu ON tbcategorymenu.id_menu_cat = tbmenulist.category");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_menu_cat = mysqli_query($conn, "SELECT id_menu_cat,category_menu FROM tbcategorymenu");
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
            Menu Page
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Add Menu</button>
                </div>
            </div>
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="procces/proccesInputMenu.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadphoto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadphoto">Upload Menu Photo</label>
                                            <div class="invalid-feedback">
                                                Please input file photo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatin
                                            gInput" placeholder="Menu name" name="menu_name" required>
                                            <label for="floatingInput">Menu Name</label>
                                            <div class="invalid-feedback">
                                                Please input menu name.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Information" name="information">
                                                <label for="floatingPassword">Information</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <select class="form-select" aria-label="Default select example" name="category" required>
                                                <option selected hidden value="Choose category menu"></option>
                                                <?php
                                                foreach ($select_menu_cat as $value){
                                                    echo "<option value=".$value['id_menu_cat'].">$value[category_menu]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Food or Drink Category</label>
                                            <div class="invalid-feedback">
                                                Please choose food or drink category.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Price" name="price" required>
                                            <label for="floatingInput">Price</label>
                                            <div class="invalid-feedback">
                                                Please input price
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Stock" name="stock" required>
                                            <label for="floatingInput">Stock</label>
                                            <div class="invalid-feedback">
                                                Please input stock
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="inputMenuValidate" value="1234">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (empty($result)) {
                echo "Data menu tidak ada";
            } else {
            foreach ($result as $row) {
            ?>

            <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="procces/proccesInputMenu.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatin
                                            gInput" value="<?php echo $row['menu_name'] ?>">
                                            <label for="floatingInput">Menu Name</label>
                                            <div class="invalid-feedback">
                                                Please input menu name.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['information'] ?>">
                                                <label for="floatingPassword">Information</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <select disabled class="form-select" aria-label="Default select example">
                                                <option selected hidden value="">Choose category menu</option>
                                                <?php
                                                foreach ($select_menu_cat as $value){
                                                    if($row['category']==$value['id_menu_cat']){
                                                        echo "<option selected value=".$value['id_menu_cat'].">$value[category_menu]</option>";    
                                                    }else{
                                                        echo "<option value=".$value['id_menu_cat'].">$value[category_menu]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Food or Drink Category</label>
                                            <div class="invalid-feedback">
                                                Please choose food or drink category.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['price'] ?>">
                                            <label for="floatingInput">Price</label>
                                            <div class="invalid-feedback">
                                                Please input price
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['stock'] ?>">
                                            <label for="floatingInput">Stock</label>
                                            <div class="invalid-feedback">
                                                Please input stock
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="inputMenuValidate" value="1234">Save changes</button>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="procces/proccesEditMenu.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadphoto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadphoto">Upload Menu Photo</label>
                                            <div class="invalid-feedback">
                                                Please input file photo.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatin
                                            gInput" placeholder="Menu name" name="menu_name" required value="<?php echo $row['menu_name'] ?>">
                                            <label for="floatingInput">Menu Name</label>
                                            <div class="invalid-feedback">
                                                Please input menu name.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Information" name="information" value="<?php echo $row['information'] ?>">
                                                <label for="floatingPassword">Information</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <select class="form-select" aria-label="Default select example" name="menu_cat">
                                                <option selected hidden value="">Choose category menu</option>
                                                <?php
                                                foreach ($select_menu_cat as $value){
                                                    if($row['category']==$value['id_menu_cat']){
                                                        echo "<option selected value=".$value['id_menu_cat'].">$value[category_menu]</option>";    
                                                    }else{
                                                        echo "<option value=".$value['id_menu_cat'].">$value[category_menu]</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Food or Drink Category</label>
                                            <div class="invalid-feedback">
                                                Please choose food or drink category.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Price" name="price" required value="<?php echo $row['price'] ?>">
                                            <label for="floatingInput">Price</label>
                                            <div class="invalid-feedback">
                                                Please input price
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Stock" name="stock" required value="<?php echo $row['stock'] ?>">
                                            <label for="floatingInput">Stock</label>
                                            <div class="invalid-feedback">
                                                Please input stock
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="inputMenuValidate" value="1234">Save changes</button>
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
                                <form class="needs-validation" novalidate action="procces/proccesDeleteMenu.php" method="post">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                    <div class="col-lg-12">
                                        <?php 
                                        if($row['menu_name'] == $_SESSION['usernameHeartcanteen']){
                                            echo "<div class='alert alert-danger'>You cannot delete yourself</div>";
                                        }else{
                                            echo "Apakah anda yakin ingin menghapus user <b>$row[menu_name]</b>";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="inputMenuValidate" value="1234" <?php echo ($row['menu_name'] == $_SESSION['usernameHeartcanteen']) ? 'disabled' : '' ; ?>>Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
                <div class="table-responsive mt-2">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Menu Photo</th>
                                <th scope="col">Menu Name</th>
                                <th scope="col">Information</th>
                                <th scope="col">Menu Type</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
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
                                    <td>
                                        <div style="width: 150px;">
                                        <img src="assets/img/<?php echo $row['photo'] ?>" class="img-fluid" alt="...">
                                        </div>
                                    </td>
                                    <td><?php echo $row['menu_name'] ?></td>
                                    <td><?php echo $row['information'] ?></td>
                                    <td><?php echo ($row['jenis_menu'] == 1) ? "Makanan" : "Minuman" ?></td>
                                    <td><?php echo $row['category_menu'] ?></td>
                                    <td><?php echo $row['price'] ?></td>
                                    <td><?php echo $row['stock'] ?></td>
                                    <td class="d-flex">
                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>
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