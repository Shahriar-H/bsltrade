<?php 


if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}
    include('./config.php');
    $obj = new db();
    
    if(isset($_GET['idd'])){
        $id=$_GET['idd'];
        $photoLink = $_GET['ph'];
        $pdfLink = $_GET['pdf'];
        $Selectsql = "SELECT * FROM products WHERE id=$id";
        $SelectSingleData = $obj->getAllProjectList($Selectsql);
        if($SelectSingleData->num_rows>0){
            $sql = "DELETE FROM products WHERE id=$id";
            $obj->DeleteData($sql,$photoLink,$pdfLink);
        }else{
            header("Location: index.php?page=allproducts");
        }
    }

?>
<div class="ProjectContainer">
    <a href="index.php?page=product">< Post projects</a>
    <div class="projectRow">
        <div style="width: 100%;">
        <?php

            $sql = "SELECT * FROM products ORDER BY id DESC";
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
                    <span><?php echo $row['subcat'] ?></span> |
                    <span><a onclick=" return confirm('Are sure to delete?')" href="index.php?page=allproducts&idd=<?php echo $row['id'] ?>&ph=<?php echo $row['cover']; ?>&pdf=<?php echo $row['pdf']; ?>">Delete</a></span> | 
                    <span><a href="index.php?page=editproduct&ide=<?php echo $row['id'] ?>">Edit</a></span>
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