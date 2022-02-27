<?php 

session_start();
if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/vendor.min.css">
    <link rel="stylesheet" href="./assets/styleText.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>BSL Admin Dashdoard</title>
</head>
<body>
    <div class="bsl_main_MasterDiv">
        <div class="mainBar_dashboard">
            <h4 style="font-weight:600;font-size:20px;">BSL Trade International</h4>
            <a href="logout.php">Logout</a>
        </div>
        <div class="bsl_main_body">
            <div class="body_part">
                <?php
                    if(isset($_GET['page'])){
                        if($_GET['page']=='product'){
                            include './productUpload.php';
                        }else if($_GET['page']=='project'){
                            include('./projects.php');
                        }else if($_GET['page']=='allprojects'){
                            include('./allprojects.php');
                        }else if($_GET['page']=='allproducts'){
                            include('./allproducts.php');
                        }
                        else if($_GET['page']=='category'){
                            include('./category.php');
                        }else if($_GET['page']=='achivements'){
                            include('./achivements.php');
                        }
                        else if($_GET['page']=='clients'){
                            include('./ourClients.php');
                        }
                        else if($_GET['page']=='sliders'){
                            include('./Slider.php');
                        }
                        else if($_GET['page']=='adduser'){
                            include('./addUser.php');
                        }
                        else if($_GET['page']=='team'){
                            include('./team.php');
                        }
                        else if($_GET['page']=='terms'){
                            include('./terms.php');
                        }
                        else if($_GET['page']=='editproduct'){
                            include('./editProducts.php');
                        }else if($_GET['page']=='editprojects'){
                            include('./editProject.php');
                        }
                        else if($_GET['page']=='editcategory'){
                            include('./editCategory.php');
                        }
                        else{
                            include('./home.php');
                        }
                        
                        
                    }else{
                        include('./home.php');
                    } 
                    
                ?>
            </div>
            
            <div class="side_bar_part">
                <ul>
                    <li class="<?php $_GET['page']==''?print_r('active'):''; ?>"><a href="./"><i class="fas fa-home"></i> Home</a></li>
                    <li class="<?php $_GET['page']=='product'||$_GET['page']=='allproducts'||$_GET['page']=='category' ?print_r('active'):''; ?>" ><a href="./index.php?page=product"><i class="fab fa-product-hunt"></i> Product</a></li>
                    <li class="<?php $_GET['page']=='project'||$_GET['page']=='allprojects' ?print_r('active'):''; ?>"><a href="./index.php?page=project"><i class="fas fa-tasks"></i> Project</a></li>
                    <li class="<?php $_GET['page']=='achivements'?print_r('active'):''; ?>"><a href="./index.php?page=achivements"><i class="fas fa-circle"></i> Achievements</a></li>
                    <li class="<?php $_GET['page']=='clients'?print_r('active'):''; ?>"><a href="./index.php?page=clients"><i class="fas fa-box"></i> Our Clients</a></li>
                    <li class="<?php $_GET['page']=='sliders'?print_r('active'):''; ?>"><a href="./index.php?page=sliders"><i class="fas fa-images"></i> Sliders</a></li>
                    <li class="<?php $_GET['page']=='team'?print_r('active'):''; ?>"><a href="./index.php?page=team"><i class="fas fa-users"></i> Team</a></li>
                    <li class="<?php $_GET['page']=='terms'?print_r('active'):''; ?>"><a href="./index.php?page=terms"><i class="fas fa-bug"></i> Terms</a></li>

                </ul>
            </div>
        </div>
    </div>
    <script src='../assets/js/vendor/jquery-3.6.0.min.js'></script>
</body>
</html>