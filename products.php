<?php 
    include('./header.php')
?>



<section class="about about-1" id="about-1">
  <h2 class="panelHead"><?php echo  $_GET['pn']; ?></h2>
  <div class="ProjectContianer">
    
<?php 
  $name = $_GET['pn'];
  $sqlCat="SELECT * FROM `products` WHERE subcat='$name'";
  $cat = $obj->getAllProjectList($sqlCat);
  if($cat->num_rows>0){
     while($rowCat=$cat->fetch_array()){

?>

    <div class="projectDiv">
      <a href="./product.php?pid=<?php echo $rowCat['id'];?>">
        <img src="./assets/images/post/<?php echo $rowCat['cover']; ?>" alt="">
        <p><?php echo $rowCat['title']; ?></p>
      </a>
    </div>

<?php }}else{
  echo '<br><br><br><div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> No Products Found.
</div><br><br><br>';
} ?>
    
  </div>

</section>



<?php 
  include('./footer.php');
?>