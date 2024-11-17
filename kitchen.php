<?php
include "procces/connect.php";


$query = mysqli_query($conn, "SELECT * FROM tblistorder LEFT JOIN tborder ON tborder.id_order = tblistorder.code_order LEFT JOIN tbmenulist ON tbmenulist.id = tblistorder.menu LEFT JOIN tbbuy ON tbbuy.id_buy = tborder.id_order ORDER BY time_order ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_menu = mysqli_query($conn, "SELECT id,menu_name FROM tbmenulist");
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
            Kitchen Page
        </div>
        <div class="card-body">

            <?php
            if (empty($result)) {
                echo "Data menu tidak ada";
            } else {
            foreach ($result as $row) {
            ?>

            <div class="modal fade" id="accept<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Accept</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="procces/proccesAcceptOrderItem.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select disabled name="menu" id="" class="form-select">
                                                <option selected hidden value="">Choose Menu</option>
                                                <?php
                                                    foreach($select_menu as $value){
                                                        if($row['menu'] == $value['id']){
                                                            echo "<option selected value=$value[id]>$value[menu_name]</option>";
                                                        }else{
                                                            echo "<option value=$value[id]>$value[menu_name]</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <label for="uploadphoto">Food & Drink Menu</label>
                                            <div class="invalid-feedback">
                                                Please choose menu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input disabled type="number" class="form-control" id="floatin
                                            gInput" placeholder="total" name="total" value="<?php echo $row['total'] ?>" required>
                                            <label for="floatingInput">Total</label>
                                            <div class="invalid-feedback">
                                                Please input total.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Notes" name="notes" value="<?php echo $row['notes'] ?>">
                                                <label for="floatingInput">Notes</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="acceptOrderItemValidate" value="1234">Accept</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="readytoserve<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ready to Serve</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="procces/proccesReadyOrderItem.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select disabled name="menu" id="" class="form-select">
                                                <option selected hidden value="">Choose Menu</option>
                                                <?php
                                                    foreach($select_menu as $value){
                                                        if($row['menu'] == $value['id']){
                                                            echo "<option selected value=$value[id]>$value[menu_name]</option>";
                                                        }else{
                                                            echo "<option value=$value[id]>$value[menu_name]</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <label for="uploadphoto">Food & Drink Menu</label>
                                            <div class="invalid-feedback">
                                                Please choose menu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input disabled type="number" class="form-control" id="floatin
                                            gInput" placeholder="total" name="total" value="<?php echo $row['total'] ?>" required>
                                            <label for="floatingInput">Total</label>
                                            <div class="invalid-feedback">
                                                Please input total.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Notes" name="notes" value="<?php echo $row['notes'] ?>">
                                                <label for="floatingInput">Notes</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="readyOrderItemValidate" value="1234">Ready to Serve</button>
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
                                <th scope="col">Time Order</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Notes</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            foreach ($result as $row) {
                                if($row['status']!=2){
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['code_order'] ?></td>
                                    <td><?php echo $row['time_order'] ?></td>
                                    <td><?php echo $row['menu_name'] ?></td>
                                    <td><?php echo $row['total'] ?></td>
                                    <td><?php echo $row['notes'] ?></td>
                                    <td>
                                        <?php
                                            if($row['status']==1){
                                                echo "<span class='badge text-bg-warning'>Enter the kitchen</span>";
                                            }elseif($row['status']==2){
                                                echo "<span class='badge text-bg-primary'>Ready to serve</span>";    
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="<?php echo (!empty($row['status'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-primary btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#accept<?php echo $row['id_list_order'] ?>">Accept</button>
                                            <button class="<?php echo (empty($row['status']) || $row['status']!=1) ? "btn btn-secondary btn-sm me-1 text-nowrap disabled" : "btn btn-success btn-sm me-1 text-nowrap"; ?>" data-bs-toggle="modal" data-bs-target="#readytoserve<?php echo $row['id_list_order'] ?>">Ready to Serve</button>
                                        </div>
                                    </td>
                                </tr>

                            <?php
                            }
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