<?php
include './header.php';

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "SELECT * FROM project WHERE id=$id";
        $data = $obj->getAllProjectList($sql);
        $row = $data->fetch_array();
    }else{
        die();
    }
    

    if($data->num_rows>0){

?>



<div class="projectViewContainer">
    <div class="ProjectViewRow">
        <div class="ProjectMainBody">
            <h3><?php echo $row['title']; ?></h3>
            <div class="specAboutpro">
                <p style="font-family: 'Times New Roman', Times, serif;" class="smalDescpOfPost">
                    <span>Admin</span> | 
                    <span><?php echo $row['created_at'] ?></span> | 
                    <span><?php echo $row['category'] ?></span> 
                </p>
            </div><br><br>
            <img style="max-width: 50%;" src="./assets/images/post/<?php echo $row['cover'] ?>" alt="">
            <br><br>
            <?php echo $row['body'] ?>
        </div>
        <div class="projectSidebar">
            <h5>More Project</h5>
            <div class="MoreProject">
                <?php 
                    $sqlImage = "SELECT * FROM project LIMIT 6";
                    $dataImage = $obj->getAllProjectList($sqlImage);
                    while($pro = $dataImage->fetch_array()){
                ?>
                    <a href="projectview.php?id=<?php echo $pro['id']; ?>">
                        <img style="border: 1px solid grey;" src="./assets/images/post/<?php echo $pro['cover'] ?>" alt="">
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <br><br><br>
</div>
























<?php
include './footer.php';
    }
?>