<?php
include "procces/connect.php";


$query = mysqli_query($conn, "SELECT *, SUM(price*total) AS prices, tborder.time_order FROM tblistorder LEFT JOIN tborder ON tborder.id_order = tblistorder.code_order LEFT JOIN tbmenulist ON tbmenulist.id = tblistorder.menu LEFT JOIN tbbuy ON tbbuy.id_buy = tborder.id_order GROUP BY id_list_order HAVING tblistorder.code_order = $_GET[order]");
$code = $_GET['order'];
$tables = $_GET['tables'];
$customer = $_GET['customer'];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
    //$code = $record['id_order'];
    //$table = $record['table'];
    //$customer = $record['customer'];
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
            Order Item Page
        </div>
        <div class="card-body">
            <a href="order" class="btn btn-primary mb-3"><i class="bi bi-arrow-left-circle"></i></a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="codeorder" value="<?php echo $code; ?>">
                        <label for="uploadphoto">Order Code</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="tables" value="<?php echo $tables; ?>">
                        <label for="uploadphoto">Table</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-2">
                        <input disabled type="text" class="form-control" id="customer" value="<?php echo $customer; ?>">
                        <label for="uploadphoto">Customer</label>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="TambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="procces/proccesInputOrderItem.php" method="post">
                                <input type="hidden" name="codeorder" value="<?php echo $code ?>">
                                <input type="hidden" name="tables" value="<?php echo $tables ?>">
                                <input type="hidden" name="customer" value="<?php echo $customer ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select name="menu" id="" class="form-select">
                                                <option selected hidden value="">Choose Menu</option>
                                                <?php
                                                    foreach($select_menu as $value){
                                                        echo "<option value=$value[id]>$value[menu_name]</option>";
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
                                            <input type="number" class="form-control" id="floatin
                                            gInput" placeholder="total" name="total" required>
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
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Notes" name="notes">
                                                <label for="floatingInput">Notes</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="inputOrderItemValidate" value="1234">Save changes</button>
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

            <div class="modal fade" id="ModalEdit<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="procces/proccesEditOrderItem.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                <input type="hidden" name="codeorder" value="<?php echo $code ?>">
                                <input type="hidden" name="tables" value="<?php echo $tables ?>">
                                <input type="hidden" name="customer" value="<?php echo $customer ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select name="menu" id="" class="form-select">
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
                                            <input type="number" class="form-control" id="floatin
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
                                    <button type="submit" class="btn btn-primary" name="editOrderItemValidate" value="1234">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                <div class="modal fade" id="ModalDelete<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="procces/proccesDeleteOrderItem.php" method="post">
                                    <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id">
                                    <input type="hidden" name="codeorder" value="<?php echo $code ?>">
                                    <input type="hidden" name="tables" value="<?php echo $tables ?>">
                                    <input type="hidden" name="customer" value="<?php echo $customer ?>">
                                    <div class="col-lg-12">
                                        Apakah anda yakin ingin menghapus item <b><?php echo $row['menu_name'] ?></b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="deleteOrderItemValidate" value="1234" <?php echo ($row['menu_name'] == $_SESSION['usernameHeartcanteen']) ? 'disabled' : '' ; ?>>Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

            <div class="modal fade" id="buy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Payment</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th scope="col">Menu</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">qyu</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Notes</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        foreach ($result as $row) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['menu_name'] ?></td>
                                                <td><?php echo number_format($row['price'], 0, ',', '.') ?></td>
                                                <td><?php echo $row['total'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                                <td><?php echo $row['notes'] ?></td>
                                                <td><?php echo number_format($row['prices'], 0, ',', '.') ?></td>
                                            </tr>

                                        <?php
                                        $total += $row['prices'];
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="5" class="fw_bold">
                                                Total Price
                                            </td>
                                            <td class="fw_bold">
                                                <?php echo number_format($total, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <span class="text-danger fs-5 fw-semibold">Are you sure you want to make a payment?</span>
                            <form class="needs-validation" novalidate action="procces/proccesBuy.php" method="post">
                                <input type="hidden" name="codeorder" value="<?php echo $code ?>">
                                <input type="hidden" name="tables" value="<?php echo $tables ?>">
                                <input type="hidden" name="customer" value="<?php echo $customer ?>">
                                <input type="hidden" name="total" value="<?php echo $total ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatin
                                            gInput" placeholder="Amount of Money" name="money" required>
                                            <label for="floatingInput">Amount of Money</label>
                                            <div class="invalid-feedback">
                                                Please input amount of money.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="buyValidate" value="1234">Buy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Menu</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Notes</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row['menu_name'] ?></td>
                                    <td><?php echo number_format($row['price'], 0, ',', '.') ?></td>
                                    <td><?php echo $row['total'] ?></td>
                                    <td>
                                        <?php
                                            if($row['status']==1){
                                                echo "<span class='badge text-bg-warning'>Enter the kitchen</span>";
                                            }elseif($row['status']==2){
                                                echo "<span class='badge text-bg-primary'>Ready to serve</span>";    
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $row['notes'] ?></td>
                                    <td><?php echo number_format($row['prices'], 0, ',', '.') ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="<?php echo (!empty($row['id_buy'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_list_order'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="<?php echo (!empty($row['id_buy'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_list_order'] ?>"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>

                            <?php
                            $total += $row['prices'];
                            }
                            ?>
                        <tr>
                            <td colspan="5" class="fw_bold">
                                Total Price
                            </td>
                            <td class="fw_bold">
                                <?php echo number_format($total, 0, ',', '.') ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <?php
            }
            ?>
            <div>
                <button class="<?php echo (!empty($row['id_buy'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?>" data-bs-toggle="modal" data-bs-target="#TambahItem"><i class="bi bi-plus-circle"></i> Add Item</button>
                <button class="<?php echo (!empty($row['id_buy'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?>" data-bs-toggle="modal" data-bs-target="#buy"><i class="bi bi-cash-coin"></i> Buy</button>
                <button onclick="printReceipt()" class="btn btn-info"><i class="bi bi-printer"></i> Print receipt</button>
            </div>
        </div>
    </div>
</div>

<div id="receiptContent" class="d-none">
    <style>
        #receipt{
            font-family: "Arial", sans-serif;
            font-size: 25px;
            max-width: 500px;
            border: 1px solid #ccc;
            padding: 100px;
            width: 100mm;
        }
        #receipt h2{
            text-align: center;
            color: #333;
        }
        #receipt p{
            margin: 5px 0;
        }
        #receipt table{
            font-size: 25px;
            border-collapse: collapse;
            margin-top: 10px;
            width: 100%;
        }
        #receipt th, #receipt td{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        #receipt .total{
            font-weight: bold;
        }
    </style>
    <div id="receipt">
    <h2>ONE Restaurant Receipt</h2>
    <p>Code Order : <?php echo $code ?></p>
    <p>Table : <?php echo $tables ?></p>
    <p>Customer : <?php echo $customer ?></p>
    <p>Order Time : <?php echo date('d/m/Y H:i:s', strtotime($result[0]['time_order']))  ?></p>

    <table>
        <thead>
            <tr>
                <th>Menu</th>
                <th>Price</th>
                <th>Total</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total=0;
            foreach($result as $row){ ?>
            <tr>
                <td><?php echo $row['menu_name'] ?></td>
                <td><?php echo number_format($row['price'], 0, ',', '.') ?></td>
                <td><?php echo $row['total'] ?></td>
                <td><?php echo number_format($row['prices'], 0, ',', '.') ?></td>
            </tr>
            <?php 
                $total += $row['prices'];
            } ?>
            <tr class="total">
                <td colspan="3"><b>Total Price</b></td>
                <td><b><?php echo number_format($total, 0, ',', '.') ?></b></td>
            </tr>
        </tbody>
    </table>
    </div>
</div>

<script>
    function printReceipt(){
        var receiptContent = document.getElementById("receiptContent").innerHTML;
        var printFrame = document.createElement("iFrame");
        printFrame.style.display = 'none';
        document.body.appendChild(printFrame);
        printFrame.contentDocument.write(receiptContent);
        printFrame.contentWindow.print();
        document.body.removeChild(printFrame);
    } 
</script>