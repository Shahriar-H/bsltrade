<?php 

if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}
    include('./config.php');
    $obj = new db();

    if(isset($_GET['id'])){
        $id = $obj->StringFillter($_GET['id']);
        $sqlCat="SELECT * FROM category WHERE id=$id";
        $cat = $obj->getAllProjectList($sqlCat);
        $rowCat=$cat->fetch_array();
    }
    if(isset($_POST['savePost'])){
        $id = $obj->StringFillter($_GET['id']);
        $title = $obj->StringFillter($_POST['title']);
        if($obj->UploadPhoto($_FILES['cover'])){
            $cover = $obj->UploadPhoto($_FILES['cover']);
        }else{
            $cover = $obj->StringFillter($_POST['coverold']);
        }
        $postProjectSql = "UPDATE `category` SET `name`='$title',`photo`='$cover' WHERE id=$id";
        $obj->UpdatePost($postProjectSql);
    }

?>
<div class="ProjectContainer">
    <div class="projectRow">
        <form action="index.php?page=editcategory&id=<?php echo $rowCat['id'] ?>" method="POST" enctype="multipart/form-data" >
            <div class="labelAndInputF">
                <label>Products Category-</label><br>
                <input required type="text" name="title" value="<?php echo $rowCat['name'] ?>">
            </div>
            <div class="labelAndInputF">
                <label>Category Image-</label><br>
                <input type="file" name="cover">
                <input type="hidden" name="coverold" value="<?php echo $rowCat['photo'] ?>">

            </div>
            <input class="sbtnButon" type="submit" name="savePost" value="Update">
        </form>
    </div>
    
</div>