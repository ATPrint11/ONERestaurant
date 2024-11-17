            <?php 
            session_start();
                if(isset ($_GET['x']) && $_GET['x']=='home'){
                    $page = "home.php";
                    include "main.php";
                }elseif(isset ($_GET['x']) && $_GET['x']=='order'){
                    if ($_SESSION['levelHeartcanteen']==1 || $_SESSION['levelHeartcanteen']==2 || $_SESSION['levelHeartcanteen']==3) {
                    $page = "order.php";
                    include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset ($_GET['x']) && $_GET['x']=='user'){
                    if ($_SESSION['levelHeartcanteen']==1) {
                        $page = "user.php";
                        include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset ($_GET['x']) && $_GET['x']=='kitchen'){
                    if ($_SESSION['levelHeartcanteen']==1 || $_SESSION['levelHeartcanteen']==4) {
                    $page = "kitchen.php";
                    include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset ($_GET['x']) && $_GET['x']=='report'){
                    if ($_SESSION['levelHeartcanteen']==1) {
                        $page = "report.php";
                        include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }

                }elseif(isset ($_GET['x']) && $_GET['x']=='menu'){
                    if ($_SESSION['levelHeartcanteen']==1 || $_SESSION['levelHeartcanteen']==3){    
                    $page = "menu.php";
                    include "main.php";
                }else{
                    $page = "home.php";
                    include "main.php";
                }
                }elseif(isset ($_GET['x']) && $_GET['x']=='about'){
                    $page = "about.php";
                    include "main.php";
                }elseif(isset ($_GET['x']) && $_GET['x']=='help'){
                    $page = "help.php";
                    include "main.php";
                }elseif(isset ($_GET['x']) && $_GET['x']=='login'){
                    include "logIn.php";
                }elseif(isset ($_GET['x']) && $_GET['x']=='logout'){
                    include "procces/proccesLogout.php";
                }elseif(isset ($_GET['x']) && $_GET['x']=='menuCat'){
                    if ($_SESSION['levelHeartcanteen']==1) {
                    $page = "menuCat.php";
                    include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset ($_GET['x']) && $_GET['x']=='orderItem'){
                    if ($_SESSION['levelHeartcanteen']==1 || $_SESSION['levelHeartcanteen']==3 || $_SESSION['levelHeartcanteen']==2){
                    $page = "orderItem.php";
                    include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }elseif(isset ($_GET['x']) && $_GET['x']=='viewItem'){
                    if ($_SESSION['levelHeartcanteen']==1){
                    $page = "viewItem.php";
                    include "main.php";
                    }else{
                        $page = "home.php";
                        include "main.php";
                    }
                }else{
                    $page = "home.php";
                    include "main.php";
                }
            ?>