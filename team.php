<?php
include('./header.php');

?>




<section class="team team-1" id="team">
    <div class="container">
        <div class="row">
            <div class=" col-12 col-md-6 col-lg-4">


            <?php

                $sqlCat3 = "SELECT * FROM team";
                $cat3 = $obj->getAllProjectList($sqlCat3);
                if ($cat3->num_rows > 0) {
                    while ($rowCat3 = $cat3->fetch_array()) {

            ?>
                <div class="member">
                    <div class="member-img"><img src="assets/images/post/<?php echo $rowCat3['photo'] ?>" alt="Member" /></div>

                    <div class="member-content">
                        <div class="member-info"><a href="javascript:void(0)"><?php echo $rowCat3['name'] ?></a>
                            <h6><?php echo $rowCat3['designation'] ?></h6>
                        </div>


                    </div>

                </div>

                <?php }} ?>

            </div>
            
        </div>
        

    </div>

</section>










<?php
include('./footer.php');
?>