<?php
include "procces/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tborder.*,tbbuy.*,nama, SUM(price*total) AS prices FROM tborder LEFT JOIN tbuser ON tbuser.id = tborder.waiter LEFT JOIN tblistorder ON tblistorder.code_order = tborder.id_order LEFT JOIN tbmenulist ON tbmenulist.id = tblistorder.menu JOIN tbbuy ON tbbuy.id_buy = tborder.id_order GROUP BY id_order ORDER BY time_order ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$query_chart = mysqli_query($conn, "SELECT menu_name, tbmenulist.id, SUM(tblistorder.total) AS total_amount FROM tbmenulist LEFT JOIN tblistorder ON tbmenulist.id = tblistorder.menu GROUP BY tbmenulist.id ORDER BY tbmenulist.id ASC");
    //$result_chart = array();
    while ($record_chart = mysqli_fetch_array($query_chart)){
        $result_chart[] = $record_chart;
    }

    $array_menu = array_column($result_chart, 'menu_name');
    $array_menu_quote = array_map(function($menu){
        return "'".$menu."'";
    }, $array_menu);
    $string_menu = implode(',', $array_menu_quote);
    $array_total_amount = array_column($result_chart, 'total_amount');
    $string_total_amount = implode(',', $array_total_amount);

//$select_menu_cat = mysqli_query($conn, "SELECT id_menu_cat,category_menu FROM tbcategorymenu");
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            Report Page
        </div>
        <div class="card-body">

            <?php
            if (empty($result)) {
                echo "Data menu tidak ada";
            } else {
            foreach ($result as $row) {
            ?>
            
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
                                <th scope="col">Payment Time</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Table</th>
                                <th scope="col">Price Total</th>
                                <th scope="col">Waiter</th>
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
                                    <td><?php echo $row['time_order'] ?></td>
                                    <td><?php echo $row['payment_time'] ?></td>
                                    <td><?php echo $row['customer'] ?></td>
                                    <td><?php echo $row['tables'] ?></td>
                                    <td><?php echo number_format((int)$row['prices'],0,',','.') ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1" href="./?x=viewItem&order=<?php echo $row['id_order']."&tables=".$row['tables']."&customer=".$row['customer'] ?>"><i class="bi bi-eye"></i></a>
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
    <div class="card mt-4 border-0 bg-light">
        <div class="card-body text-center">
            <div>
                <canvas id="myChart"></canvas>
            </div>
                    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: [<?php echo $string_menu ?>],
            datasets: [{
                label: 'Number of servings sold',
                data: [<?php echo $string_total_amount ?>],
                borderWidth: 1,
                backgroundColor:['rgba(255, 0, 0, 1)','rgba(0, 0, 255, 1)','rgba(255, 255, 0, 1)','rgba(0, 255, 0, 1)','rgba(210, 0, 180, 1)']
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
        </script>
        </div>
    </div>
</div>