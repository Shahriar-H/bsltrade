<?php
include './header.php';


?>

<?php 
                            
    $selectTermSQL = "SELECT * FROM terms WHERE id=1";
    $selectTerm = $obj->getAllProjectList($selectTermSQL);
    $row = $selectTerm->fetch_array();
    

?>

<div class="projectViewContainer">
    <div class="ProjectViewRow">
        <div class="ProjectMainBody" style="width: 100%;">
            <h3>BSL's Terms & Conditions</h3>
            <div class="specAboutpro">
                <p style="font-family: 'Times New Roman', Times, serif;" class="smalDescpOfPost">
                    updated at: <?php 
                    echo $row['created_at'];
                ?>
                </p>
            </div><br><br>
            <div class="">
            <?php 
                echo $row['body'];
            
            ?>
            </div>           
        </div>
        
    </div>
    <br><br><br>
</div>
























<?php
include './footer.php';
    
?>