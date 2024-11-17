<?php
include "procces/connect.php";


$query = mysqli_query($conn, "SELECT *, SUM(price*total) AS prices FROM tblistorder LEFT JOIN tborder ON tborder.id_order = tblistorder.code_order LEFT JOIN tbmenulist ON tbmenulist.id = tblistorder.menu LEFT JOIN tbbuy ON tbbuy.id_buy = tborder.id_order GROUP BY id_list_order HAVING tblistorder.code_order = $_GET[order]");
$code = $_GET['order'];
$tables = $_GET['tables'];
$customer = $_GET['customer'];
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
            View Item Page
        </div>
        <div class="card-body">
            <a href="report" class="btn btn-primary mb-3"><i class="bi bi-arrow-left-circle"></i></a>
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
            
            <?php
            if (empty($result)) {
                echo "Data menu tidak ada";
            } else {
            foreach ($result as $row) {
            ?>

            <?php
            }
            ?>

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
                                    <td><b><?php echo number_format($row['prices'], 0, ',', '.') ?></b></td>
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
        </div>
    </div>
</div>