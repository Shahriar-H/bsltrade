<?php
  include('./header.php');
?>


<div class="module-content module-search-warp">
  <div class="pos-vertical-center">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
          <form class="form-search">
            <input class="form-control" type="text" placeholder="type words then enter" />
            <button></button>
          </form>

        </div>

      </div>

    </div>

  </div><a class="module-cancel" href="#"><i class="fas fa-times"></i></a>

</div>

<section class="slider slider-1" style="margin-left: -1px;" id="slider-1">
  <div class="container-fluid pe-0 ps-0">
    <div class="slider-carousel owl-carousel carousel-navs carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="true" data-speed="800">

    <?php 
    
      include('./__slides.php');
    
    ?>
      

    </div>

  </div>

</section>

<section class="about about-1" id="about-1">

  <div class="ProjectContianer">
    <?php 
    //product Category showing
      include('./__productCategory.php');
    ?>
  </div>

</section>

<section class="features features-1 bg-overlay bg-overlay-theme2" id="features-1">
  <div class="bg-section"> <img src="assets/images/background/2.jpg" alt="Background" /></div>
  <h2 class="achievmentTitle">Achievements</h2>
  <div class="container">
    <div class="carousel owl-carousel carousel-dots" data-slide="4" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
      
     <?php 
     //achivements showing here
      include('./__achivements.php');
     ?>

    </div>
<br><br><br>

    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="more-features">
          <p>If you have any questions or need help, feel free to contact with our team, or you can call us any time
            <a href="tel:01713-066433">(+088) 01713-066433</a>
            This video will make understand what we do and why you should buy our products and services
        </div>
      </div>
      <div class="col-12 col-lg-8">

        <div class="video video-1 bg-overlay bg-overlay-video" id="video-1">
          <div class="bg-section"><img src="assets/images/video/1.jpg" alt="background" /></div><a class="popup-video btn-video" href="https://www.youtube.com/watch?v=8gYtnoARbrQ"> <i class="fas fa-play"></i><span>watch our video!</span></a>

        </div>
      </div>
    </div>

  </div>

</section>
<br><br><br>
<br>

<section class="shortDecpAboutCom">
  <div class="shortDespcontainer">
    <div class="twolineDesc">
      <i class="fas fa-industry"></i>
      <h1>2017</h1>
      <p>SINCE</p>
    </div>
    <div class="twolineDesc">
      <i class="fas fa-microscope"></i>
      <h1>14+</h1>
      <p>R&D STUFF</p>
    </div>
    <div class="twolineDesc">
      <i class="fas fa-users"></i>
      <h1>35+</h1>
      <p>EMPLOYEE</p>
    </div>
    <div class="twolineDesc">
      <i class="fas fa-network-wired"></i>
      <h1>10+</h1>
      <p>GLOBLE MARKETS</p>
    </div>
  </div>
</section>
<?php 
  include('./__section_project.php');
 ?>
<section class="clients clients-carousel clients-1" id="clients-1">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="text-dark text-center mt-3">Our Clients</h3>
      </div>
      <div class="col-12">
        <div class="carousel owl-carousel" data-slide="6" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="false" data-space="0" data-loop="true" data-speed="3000">
          <?php 
            include('./__clients.php');
          ?>
        </div>
      </div>
    </div>

  </div>

</section>




<?php

include('./footer.php');

?>