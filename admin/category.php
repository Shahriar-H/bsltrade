<?php 

if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}
    include('./config.php');
    $obj = new db();
    if(isset($_POST['savePost'])){
        $title = $obj->StringFillter($_POST['title']);
        $cover = $obj->UploadPhoto($_FILES['cover']);

        $postProjectSql = "INSERT INTO `category` (`name`,`photo`) VALUES ('$title','$cover')";
        $obj->UploadPost($postProjectSql);
    }

?>
<div class="ProjectContainer">
    <div class="projectRow">
        <form action="index.php?page=category" method="POST" enctype="multipart/form-data" >
            <div class="labelAndInputF">
                <label>Products Category-</label><br>
                <input required type="text" name="title" placeholder="Solar panel">
            </div>
            <div class="labelAndInputF">
                <label>Category Image-</label><br>
                <input type="file" name="cover">
            </div>
            <input class="sbtnButon" type="submit" name="savePost" value="Publish">
        </form>
    </div>
    <div class="catDiv">
        <h4 class="catname" style="background-color: white;margin-bottom:10px;">Category List</h4>
            <?php 

            if(isset($_GET['idd'])){
                $id=$_GET['idd'];
                $Selectsql = "SELECT * FROM category WHERE id=$id";
                $SelectSingleData = $obj->getAllProjectList($Selectsql);
                if($SelectSingleData->num_rows>0){
                    $sql = "DELETE FROM category WHERE id=$id";
                    $obj->DeleteData($sql,'','');
                }else{
                    header("Location: index.php?page=category");
                }
            }
            
                $sqlCat="SELECT * FROM category";
                $cat = $obj->getAllProjectList($sqlCat);
                if($cat->num_rows>0){
                    while($rowCat=$cat->fetch_array()){
                        
            ?>

            <p class="catname">
                <span><img class="catPhoto" src="../assets/images/post/<?php echo $rowCat['photo']; ?>" alt=""><?php echo $rowCat['name'];  ?></span> 
                <span>
                    <a href="index.php?page=category&idd=<?php echo $rowCat['id']; ?>">Delete</a> 
                    <a href="index.php?page=editcategory&id=<?php echo $rowCat['id']; ?>">Edit</a> 
                </span>
            </p>

            <?php
                    }
                }
            ?>
       
    </div>
</div>