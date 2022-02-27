<?php 


if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}
    include('./config.php');
    $obj = new db();
    if(isset($_POST['savePost'])){
        $title = $obj->StringFillter($_POST['title']);
        $cover = $obj->UploadPhoto($_FILES['cover']);
        if($cover!=false){
            $postProjectSql = "INSERT INTO `clients` (`title`,`cover`) VALUES ('$title','$cover')";
            $obj->UploadPost($postProjectSql);
        }
        
    }

?>
<div class="ProjectContainer">
    <div class="projectRow">
        <form action="index.php?page=clients" method="POST" enctype="multipart/form-data" >
            <div class="labelAndInputF">
                <label>Clients Name-</label><br>
                <input required type="text" name="title" placeholder="Solar panel">
            </div>
            <div class="labelAndInputF">
                <label>Company Logo-</label><br>
                <input type="file" name="cover">
            </div>
            <input class="sbtnButon" type="submit" name="savePost" value="Publish">
        </form>
    </div>
    <div class="catDiv">
        <h4 class="catname" style="background-color: white;margin-bottom:10px;">Clients List</h4>
            <?php 

            if(isset($_GET['idd'])){
                $id=$_GET['idd'];
                $pn = $_GET['pn'];
                $Selectsql = "SELECT * FROM clients WHERE id=$id";
                $SelectSingleData = $obj->getAllProjectList($Selectsql);
                if($SelectSingleData->num_rows>0){
                    $sql = "DELETE FROM clients WHERE id=$id";
                    $obj->DeleteData($sql,$pn,'');
                }else{
                    header("Location: index.php?page=clients");
                }
            }
            
                $sqlCat="SELECT * FROM clients";
                $cat = $obj->getAllProjectList($sqlCat);
                if($cat->num_rows>0){
                    while($rowCat=$cat->fetch_array()){
                        
            ?>

            <p class="catname">
                <span><img class="catPhoto" src="../assets/images/post/<?php echo $rowCat['cover']; ?>" alt=""><?php echo $rowCat['title'];  ?></span> 
                <span><a href="index.php?page=clients&idd=<?php echo $rowCat['id']; ?>&pn=<?php echo $rowCat['cover']; ?>">Delete</a></span>
            </p>

            <?php
                    }
                }
            ?>
       
    </div>
</div>