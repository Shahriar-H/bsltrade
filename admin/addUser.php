<?php 
if($_SESSION['role']!=1){
    echo '<span style="color:red">This page is restricted only for Admin (Need Super Admin Access)</span>';
    die();
}
if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}
    include('./config.php');
    $obj = new db();
    if(isset($_POST['savePost'])){
        $name = $obj->StringFillter($_POST['name']);
        $email = $obj->StringFillter($_POST['email']);
        $password = $obj->StringFillter($_POST['password']);
        $role = $obj->StringFillter($_POST['role']);

        $sqlCat1="SELECT * FROM users WHERE email='$email' LIMIT 1";
        $cat1 = $obj->getAllProjectList($sqlCat1);
        if($cat1->num_rows<1){

            $postProjectSql = "INSERT INTO `users` (`name`,`email`,`password`,`role`) VALUES ('$name','$email','$password',$role)";
            $obj->UploadPost($postProjectSql);
        }else{
            echo '<div class="alerBarClass">
            <strong>Warning!</strong> This email has already Taken.
            </div>';
        }
    }

?>
<div class="ProjectContainer">
    <div class="projectRow">
        <form action="index.php?page=adduser" method="POST" enctype="multipart/form-data" >
            <div class="labelAndInputF">
                <label>Full Name-</label><br>
                <input type="text" name="name" placeholder="Shahriar hussain">
            </div>   
            <div class="labelAndInputF">
                <label>Role-</label><br>
                <select style="width: 100%;" name="role" id="">
                    <option selected value="0">Admin</option>
                    <option selected value="1">Super Admin</option>
                </select>
            </div>  
            <div class="labelAndInputF">
                <label>Email-</label><br>
                <input required type="email" name="email" placeholder="Shakihusain4@gmail.com">
            </div>
            <div class="labelAndInputF">
                <label>Password-</label><br>
                <input type="text" name="password" placeholder="@3$w344dfciien3">
            </div>

            <input class="sbtnButon" type="submit" name="savePost" value="ADD">
        </form>
    </div>
    <div class="catDiv">
        <h4 class="catname" style="background-color: white;margin-bottom:10px;">Admins List</h4>
            <?php 

            if(isset($_GET['idd'])){
                $id=$_GET['idd'];
                $Selectsql = "SELECT * FROM users WHERE id=$id";
                $SelectSingleData = $obj->getAllProjectList($Selectsql);
                if($SelectSingleData->num_rows>0){
                    $sql = "DELETE FROM users WHERE id=$id";
                    $obj->DeleteData($sql,'','');
                }else{
                    header("Location: index.php?page=category");
                }
            }
            
                $sqlCat="SELECT * FROM users";
                $cat = $obj->getAllProjectList($sqlCat);
                if($cat->num_rows>0){
                    while($rowCat=$cat->fetch_array()){
                        
            ?>

            <p class="catname">
                
                <span><?php echo $rowCat['name'];
                if($rowCat['role']==1){
                    echo '<span style="color:red">*</span>';
                }
                ?></span> 
                <span><?php echo $rowCat['email'];  ?></span>
                <span><?php echo $rowCat['password'];  ?></span>
                <span><a href="index.php?page=adduser&idd=<?php echo $rowCat['id']; ?>">Delete</a></span>
            </p>

            <?php
                    }
                }
            ?>
       
    </div>
</div>