<?php 

if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}
    include('./config.php');
    $obj = new db();
    if(isset($_POST['savePost'])){
        $title = $obj->StringFillter($_POST['title']);
        $designa = $obj->StringFillter($_POST['designation']);
        $cover = $obj->UploadPhoto($_FILES['cover']);

        $postProjectSql = "INSERT INTO `team` (`name`,`photo`,`designation`) VALUES ('$title','$cover','$designa')";
        $obj->UploadPost($postProjectSql);
    }

?>
<div class="ProjectContainer">
    <div class="projectRow">
        <form action="index.php?page=team" method="POST" enctype="multipart/form-data" >
            <div class="labelAndInputF">
                <label>Members' Name-</label><br>
                <input required type="text" name="title" placeholder="Shahriar Hussain">
            </div>
            <div class="labelAndInputF">
                <label>Members' Designation-</label><br>
                <input required type="text" name="designation" placeholder="CEO">
            </div>
            <div class="labelAndInputF">
                <label>Members' Image-</label><br>
                <input type="file" name="cover">
            </div>
            <input class="sbtnButon" type="submit" name="savePost" value="Publish">
        </form>
    </div>
    <div class="catDiv">
        <h4 class="catname" style="background-color: white;margin-bottom:10px;">Team List</h4>
            <?php 

            if(isset($_GET['idd'])){
                $id=$_GET['idd'];
                $pn=$_GET['pn'];
                $Selectsql = "SELECT * FROM team WHERE id=$id";
                $SelectSingleData = $obj->getAllProjectList($Selectsql);
                if($SelectSingleData->num_rows>0){
                    $sql = "DELETE FROM team WHERE id=$id";
                    $obj->DeleteData($sql,$pn,'');
                }else{
                    header("Location: index.php?page=team");
                }
            }
            
                $sqlCat="SELECT * FROM team";
                $cat = $obj->getAllProjectList($sqlCat);
                if($cat->num_rows>0){
                    while($rowCat=$cat->fetch_array()){
                        
            ?>

            <p class="catname">
                <span><img class="catPhoto" src="../assets/images/post/<?php echo $rowCat['photo']; ?>" alt=""><?php echo $rowCat['name'];  ?></span> 
                <span><?php echo $rowCat['designation'] ?></span>
                <span><a href="index.php?page=team&idd=<?php echo $rowCat['id']; ?>&pn=<?php echo $rowCat['photo']; ?>">Delete</a></span>
            </p>

            <?php
                    }
                }
            ?>
       
    </div>
</div>