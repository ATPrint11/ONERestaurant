<?php
include "procces/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tborder.*,tbbuy.*,nama, SUM(price*total) AS prices FROM tborder LEFT JOIN tbuser ON tbuser.id = tborder.waiter LEFT JOIN tblistorder ON tblistorder.code_order = tborder.id_order LEFT JOIN tbmenulist ON tbmenulist.id = tblistorder.menu LEFT JOIN tbbuy ON tbbuy.id_buy = tborder.id_order GROUP BY id_order ORDER BY time_order DESC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

//$select_menu_cat = mysqli_query($conn, "SELECT id_menu_cat,category_menu FROM tbcategorymenu");
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
            Order Page
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col text-center">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Add Order</button>
                </div>
            </div>
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Order Food & Drink</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="procces/proccesInputOrder.php" method="post">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="codeorder" name="codeorder" value="<?php echo date('ymdHi').rand(100,999) ?>" readonly>
                                            <label for="codeorder">Code Order</label>
                                            <div class="invalid-feedback">
                                                Please input code order.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="tables" placeholder="No Table" name="tables" required>
                                            <label for="tables">Table</label>
                                            <div class="invalid-feedback">
                                                Please input no table.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="customer" placeholder="Customer Name" name="customer" required>
                                            <label for="customer">Customer</label>
                                            <div class="invalid-feedback">
                                                Please input customer name.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="inputOrderValidate" value="1234">Make an Order</button>
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

            <div class="modal fade" id="ModalEdit<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="procces/proccesEditOrder.php" method="post">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="codeorder" name="codeorder" value="<?php echo $row['id_order'] ?>" readonly>
                                            <label for="codeorder">Code Order</label>
                                            <div class="invalid-feedback">
                                                Please input code order.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="tables" placeholder="No Table" name="tables" value="<?php echo $row['tables'] ?>" required>
                                            <label for="tables">Table</label>
                                            <div class="invalid-feedback">
                                                Please input no table.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="customer" placeholder="Customer Name" name="customer" value="<?php echo $row['customer'] ?>" required>
                                            <label for="customer">Customer</label>
                                            <div class="invalid-feedback">
                                                Please input customer name.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="editOrderValidate" value="1234">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Order</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="procces/proccesDeleteOrder.php" method="post">
                                    <input type="hidden" value="<?php echo $row['id_order'] ?>" name="codeorder">
                                    <div class="col-lg-12">
                                        Apakah anda yakin ingin menghapus user <b><?php echo $row['customer'] ?></b> dan Code Order <b><?php echo $row['id_order'] ?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="deleteOrderValidate" value="1234">Delete</button>
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
                                <th scope="col">Code Order</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Table</th>
                                <th scope="col">Price Total</th>
                                <th scope="col">Waiter</th>
                                <th scope="col">Status</th>
                                <th scope="col">Time Order</th>
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
                                    <td><?php echo $row['id_order'] ?></td>
                                    <td><?php echo $row['customer'] ?></td>
                                    <td><?php echo $row['tables'] ?></td>
                                    <td><?php echo number_format((int)$row['prices'],0,',','.') ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo (!empty($row['id_buy'])) ? "<span class='badge text-bg-success'>Paid</span>" : ""; ?></td>
                                    <td><?php echo $row['time_order'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1" href="./?x=orderItem&order=<?php echo $row['id_order']."&tables=".$row['tables']."&customer=".$row['customer'] ?>"><i class="bi bi-eye"></i></a>
                                            <button class="<?php echo (!empty($row['id_buy'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_order'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="<?php echo (!empty($row['id_buy'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_order'] ?>"><i class="bi bi-trash"></i></button>
                                        </div>
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