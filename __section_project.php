
<?php 

    // include('./config.php');
    // $obj  = new db();
    $sql = "SELECT * FROM project ORDER BY id DESC";
    $data = $obj->getAllProjectList($sql);

    if($data->num_rows>0){

?>

<section class="projects projects-modern projects-modern-1" id="projects-modern-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
                <div class="heading heading-5 text-center">
                    <p class="heading-subtitle">Innovation, Quality And Continuous Improvement</p>
                    <h2 class="heading-title">Latest Projects, Solutions And Energy Supplies</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="carousel owl-carousel carousel-dots" data-slide="3" data-slide-rs="1" data-autoplay="true" data-nav="false" data-dots="true" data-space="30" data-loop="true" data-speed="3000">
                    
                <?php 
                
                    while($row=$data->fetch_array()){
                
                ?>
                
                    <div>
                        <div class="project-panel" data-hover="">
                            <div class="project-panel-holder">
                                <div class="project-img"><a class="link" href="projectview.php?id=<?php echo $row['id'] ?>"></a><img src="assets/images/post/<?php echo $row['cover'] ?>" alt="project image" /></div>

                                <div class="project-content">
                                    <div class="project-cat" >
                                        <?php echo $row['category'] ?>
                                    </div>
                                    <div class="project-title">
                                        <h4><a href="projectview.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h4>
                                    </div>
                                    <!-- <div class="project-desc">
                                        <p><?php echo substr($row['body'],0,150) ?></p>
                                    </div> -->
                                    <div class="project-more"> <a class="btn btn--bordered btn--white" href="projectview.php?id=<?php echo $row['id'] ?>">Read more <i class="energia-arrow-right"></i></a></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                <?php } ?>
                    
                </div>
            </div>
        </div>

    </div>

</section>

<?php } ?>