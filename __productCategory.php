<?php 
      $sqlCat="SELECT * FROM category";
      $cat = $obj->getAllProjectList($sqlCat);
      if($cat->num_rows>0){
        while($rowCat=$cat->fetch_array()){
    ?>
      <div class="projectDiv">
        <a href="products.php?pn=<?php echo $rowCat['name'] ?>">
          <img src="./assets/images/post/<?php echo $rowCat['photo'] ?>" alt="">
          <p><?php echo $rowCat['name'] ?></p>
        </a>
      </div>
    <?php }} ?>