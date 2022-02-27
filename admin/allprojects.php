<?php 


if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}
    include('./config.php');
    $obj = new db();
    
    if(isset($_GET['idd'])){
        $id=$_GET['idd'];
        $photoLink = $_GET['ph'];
        $Selectsql = "SELECT * FROM project WHERE id=$id";
        $SelectSingleData = $obj->getAllProjectList($Selectsql);
        if($SelectSingleData->num_rows>0){
            $sql = "DELETE FROM project WHERE id=$id";
            $obj->DeleteData($sql,$photoLink,'');
        }else{
            header("Location: index.php?page=allprojects");
        }
    }

?>
<div class="ProjectContainer">
    <a href="index.php?page=project">< Post projects</a>
    <div class="projectRow">
        <div style="width: 100%;">
        <?php

            $sql = "SELECT * FROM project ORDER BY id DESC";
            $data = $obj->getAllProjectList($sql);
            if($data->num_rows>0){
                while($row=$data->fetch_array()){
        
        ?>

        <div class="projectContainerI">

            <img class="postCover" src="../assets/images/post/<?php echo $row['cover'] ?>" alt="Cover">
            <div class="projecsCase">
                <a href="">
                    <h4 class="projectTite"><?php echo $row['title'] ?></h4>
                </a>                    
                <p style="font-family: 'Times New Roman', Times, serif;" class="smalDescpOfPost">
                    <span>Admin</span> | 
                    <span><?php echo $row['created_at'] ?></span> | 
                    <span>Topic</span> |
                    <span><a onclick=" return confirm('Are sure to delete?')" href="index.php?page=allprojects&idd=<?php echo $row['id'] ?>&ph=<?php echo $row['cover']; ?>">Delete</a></span> | 
                    <span><a href="index.php?page=editprojects&ide=<?php echo $row['id'] ?>">Edit</a></span>
                </p>
              
            </div>
        </div>

        <?php 
                }
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> Projects Empty.
                    </div>';
            }
        ?>
            
        </div>
        
    </div>
</div>