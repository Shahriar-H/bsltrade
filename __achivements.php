<?php 

$sqlCat1="SELECT * FROM achivements";
$cat1 = $obj->getAllProjectList($sqlCat1);
if($cat1->num_rows>0){
    while($rowCat1=$cat1->fetch_array()){

?>

<div>
  <div class="feature-panel-holder" data-hover="">
    <div class="feature-panel">
      <div class="feature-icon">
        <img style="max-width: 100px;" src="./assets/images/post/<?php echo $rowCat1['cover'] ?>" alt="">
      </div>
      <div class="feature-content">
        <h4><?php echo $rowCat1['title'] ?></h4>
        <p>
        <?php echo $rowCat1['descript'] ?>
        </p>
      </div>
    </div>

  </div>
</div>

<?php }} ?>