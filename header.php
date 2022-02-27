<?php 

  include('./config.php');
  $obj = new db();

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="Home- BSL Trade International" />
  <title>Home- BSL Trade International</title>
  <link href="assets/images/logo/logo.jpg" rel="icon" />

  <link rel="preconnect" href="https://fonts.gstatic.com/" />
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />

  <link href="assets/css/vendor.min.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />

  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        '../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-MDF43VH');
  </script>

</head>

<body>
  <div class="preloader">
    <div class="dual-ring"></div>
  </div>

  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDF43VH" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>


  <div class="wrapper clearfix" id="wrapperParallax">

    <header class="header header-light header-topbar header-topbar1 header-shadow" id="navbar-spy">

      <nav class="navbar navbar-expand-lg navbar-sticky" id="primary-menu"><a class="navbar-brand" href="/index.php"><img class="logo logo-dark" src="assets/images/logo/Logo.png" alt="bsl Logo" /><img class="logo logo-mobile" src="assets/images/logo/Logo.png" alt="bsl Logo" /></a>
        <div class="module-holder module-holder-phone">

          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav me-auto">
            <li class="nav-item active" data-hover=""><a class="dropdown-toggle homeTogol" href="/index.php" data-toggle="dropdown"><span>HOME</span></a>
            </li>
            <li class="nav-item has-dropdown" data-hover=""><a class="dropdown-toggle" href="#" data-toggle="dropdown"><span>ABOUT US</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="team.php"><span>BSL TEAM</span></a></li>
                <li class="nav-item"><a href="page-team.html"><span>BSL PROFILE</span></a></li>
                <li class="nav-item"><a href="page-how-works.html"><span>BSL CULTURE</span></a></li>
                <li class="nav-item"><a href="page-team.html"><span>BSL EVENT</span></a></li>
                <li class="nav-item"><a href="page-awards.html"><span>BSL HONORS</span></a></li>
                
              </ul>
            </li>
            <li class="nav-item has-dropdown" id="departments" data-hover=""><a class="dropdown-toggle" href="page-services.html" data-toggle="dropdown"><span>PRODUCTS</span></a>
              <ul class="dropdown-menu customDropForProd">
               
               <?php 
                  $sqlCat="SELECT * FROM category";
                  $cat = $obj->getAllProjectList($sqlCat);
                  if($cat->num_rows>0){
                    while($rowCat=$cat->fetch_array()){
               ?>
                  <li class="nav-item"><a href="products.php?pn=<?php echo $rowCat['name'] ?>"><span><?php echo $rowCat['name']; ?></span></a></li>
                <?php }} ?>
              </ul>

            </li>
            <li class="nav-item has-dropdown" id="departments" data-hover=""><a class="dropdown-toggle" href="page-services.html" data-toggle="dropdown"><span>SERVICE</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="services-solar.html"><span>Products Warranty</span></a></li>
                <li class="nav-item"><a href="services-battery.html"><span>Global Services</span></a></li>
                <li class="nav-item"><a href="./faq.php"><span>FAQs</span></a></li>
              </ul>
            </li>
            <li class="nav-item" data-hover=""><a class="dropdown-toggle homeTogol" href="#projects-modern-1" data-toggle="dropdown"><span>PROJECTS</span></a>
            </li>

            <li class="nav-item" id="contact" data-hover=""><a href="#Footer"><span>CONTACT</span></a></li>
          </ul>
        </div>

      </nav>

    </header>