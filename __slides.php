<?php

$sqlCat3 = "SELECT * FROM sliders";
$cat3 = $obj->getAllProjectList($sqlCat3);
if ($cat3->num_rows > 0) {
    while ($rowCat3 = $cat3->fetch_array()) {

?>


        <div class="slide bg-overlay bg-overlay-dark-slider">
            <div class="bg-section"><img src="assets/images/post/<?php echo $rowCat3['cover'] ?>" alt="Background" /></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="slide-content">
                            <h1 class="slide-headline"><?php echo $rowCat3['title'] ?></h1>
                            <!-- <p class="slide-desc">a world wide distrbuter of solar supplies &amp; knowledgable service.</p> -->
                            <div class="slide-action">
                                <div class="slide-list">
                                    <div class="icon"> <i class="flaticon-040-green-energy"></i></div>
                                    <div class="icon"> <i class="flaticon-020-factory"></i></div>
                                    <div class="icon"> <i class="flaticon-031-nuclear-plant"></i></div>
                                </div>
                                <!-- <a class="btn btn--primary" href="page-services.html"> <span>our services</span><i class="energia-arrow-right"></i></a> -->
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>


<?php
    }
}
?>