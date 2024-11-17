<div class="col-lg-3 mt-2 rounded border bg-light">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler text-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="width: 75px;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x']=='home') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark' ; ?>" aria-current="page" href="home"><i class="bi bi-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='about') ? 'active link-light' : 'link-dark' ; ?>" href="about"><i class="bi bi-info-circle"></i> About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='help') ? 'active link-light' : 'link-dark' ; ?>" href="help"><i class="bi bi-question-circle"></i> Help</a>
                        </li>

                        <?php if ($hasil['level']==1 || $hasil['level']==3) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='menu') ? 'active link-light' : 'link-dark' ; ?>" href="menu"><i class="bi bi-book"></i> Menu List</a>
                        </li>
                        <?php } ?>

                        <?php if ($hasil['level']==1) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='menuCat') ? 'active link-light' : 'link-dark' ; ?>" href="menuCat"><i class="bi bi-tags"></i> Menu Category</a>
                        </li>
                        <?php } ?>

                        <?php if ($hasil['level']==1 || $hasil['level']==2 || $hasil['level']==3) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='order') ? 'active link-light' : 'link-dark' ; ?>" href="order"><i class="bi bi-cart"></i> Order</a>
                        </li>
                        <?php } ?>

                        <?php if ($hasil['level']==1 || $hasil['level']==4) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='kitchen') ? 'active link-light' : 'link-dark' ; ?>" href="kitchen"><i class="bi bi-fire"></i> Kitchen</a>
                        </li>
                        <?php } ?>


                        <?php if ($hasil['level']==1) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='user') ? 'active link-light' : 'link-dark' ; ?>" href="user"><i class="bi bi-person"></i> User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='report') ? 'active link-light' : 'link-dark' ; ?>" href="report"><i class="bi bi-flag"></i> Report</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>