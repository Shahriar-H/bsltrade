
        <?php 
        
        $sqlCat2="SELECT * FROM clients";
        $cat2 = $obj->getAllProjectList($sqlCat2);
        if($cat2->num_rows>0){
            while($rowCat2=$cat2->fetch_array()){
        
        ?>
        
        <div class="client">
          <a class="img-popup" href="assets/images/post/<?php echo $rowCat2['cover'] ?>"> </a>
          <img src="assets/images/post/<?php echo $rowCat2['cover'] ?>" alt="client" />
        </div>

        <?php }} ?>