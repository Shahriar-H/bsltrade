<?php 

if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}

    include('./config.php');
    $obj = new db();
    if(isset($_POST['savePost'])){
        $title = $obj->StringFillter($_POST['title']);
        $descript = $obj->StringFillter($_POST['descrip']);
        $cover = $obj->UploadPhoto($_FILES['cover']);

        $postProjectSql = "INSERT INTO `achivements` (`title`,`cover`,`descript`) VALUES ('$title','$cover','$descript')";
        $obj->UploadPost($postProjectSql);
    }

?>
<div class="ProjectContainer">
    <div class="projectRow">
        <form action="index.php?page=achivements" method="POST" enctype="multipart/form-data" >
            <div class="labelAndInputF">
                <label>Title-</label><br>
                <input required type="text" name="title" placeholder="Solar panel">
            </div>
            <div class="labelAndInputF">
                <label>Short Description-</label><br>
                <input required type="text" name="descrip" placeholder="Description">
            </div>
            <div class="labelAndInputF">
                <label>Image- <span class="changeShow"><i class="fas fa-bezier-curve"></i></span></label><br>
                <!-- <select onchange="getValue(this.v)" name="cover" class="IconImg" style="width: 100%;padding:10px;">
                    <option selected value="fas fa-home"><p>Icon 1</option>
                    <option value="fab fa-adn"><p>Icon 2</option>
                    <option value="fas fa-award"><p>Icon 3</option>
                    <option value="fas fa-atom"><p>Icon 4</option>
                    <option value="fas fa-bezier-curve"><p>Icon 5</option>
                    <option value="fas fa-bong"><p>Icon 6</option>
                    <option value="fas fa-box"><p>Icon 7</option>
                    <option value="fas fa-brain"><p>Icon 8</option>
                    <option value="fas fa-bug"><p>Icon 9</option>
                    <option value="fas fa-burn"><p>Icon 10</option>
                    <option value="fas fa-capsules"><p>Icon 11</option>
                    <option value="fas fa-chart-line"><p>Icon 12</option>
                    <option value="fas fa-city"><p>Icon 13</option>
                    <option value="fas fa-cloud-sun"><p>Icon 14</option>
                    <option value="fas fa-compress"><p>Icon 15</option>
                    <option value="fas fa-crop"><p>Icon 16</option>
                    <option value="fas fa-cubes"><p>Icon 17</option>
                </select> -->
            <input type="file" name="cover">
            </div>
            <input class="sbtnButon" type="submit" name="savePost" value="Publish">
        </form>
    </div>
    <div class="catDiv">
        <h4 class="catname" style="background-color: white;margin-bottom:10px;">Achivements List</h4>
            <?php 

            if(isset($_GET['idd'])){
                $id=$_GET['idd'];
                $Selectsql = "SELECT * FROM achivements WHERE id=$id";
                $SelectSingleData = $obj->getAllProjectList($Selectsql);
                if($SelectSingleData->num_rows>0){
                    $sql = "DELETE FROM achivements WHERE id=$id";
                    $obj->DeleteData($sql,'','');
                }else{
                    header("Location: index.php?page=achivements");
                }
            }
            
                $sqlCat="SELECT * FROM achivements";
                $cat = $obj->getAllProjectList($sqlCat);
                if($cat->num_rows>0){
                    while($rowCat=$cat->fetch_array()){
                        
            ?>

            <p class="catname">
                <span style="width: 20%;"><img style="max-width: 40px;" src="../assets/images/post/<?php echo $rowCat['cover']?>" alt=""> </i> <?php echo $rowCat['title'];  ?></span> 
                <span style="width: 70%;padding:5px"> <?php echo $rowCat['descript'];  ?></span>
                <span style="width: 10%;"><a href="index.php?page=achivements&idd=<?php echo $rowCat['id']; ?>">Delete</a></span>
            </p>

            <?php
                    }
                }
            ?>
       
    </div>
</div>

<script>

function getValue(val){
    var vv = document.querySelector('.IconImg').value;
    var vv = document.querySelector('.changeShow').innerHTML = '<i class="'+vv+'"></i>';

    //console.log(vv)
}

</script>