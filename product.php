<?php
include('./header.php');
    $name = $_GET['pid'];
  $sqlCat="SELECT * FROM `products` WHERE id='$name'";
  $cat = $obj->getAllProjectList($sqlCat);
  if($cat->num_rows>0){
 
    $rowCat=$cat->fetch_array();
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

    </div>
    <a class="module-cancel" href="#">
        <i class="fas fa-times"></i>
    </a>

</div>

<section class="page-title page-title-blank bg-white" id="page-title">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="./products.php?pn=<?php echo $rowCat['subcat'] ?>">shop</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $rowCat['title'] ?></li>
                    </ol>
                </div>

            </div>

        </div>

    </div>

</section>

<div class="BuyAction disNone">
    <div class="alerDivForSells">
        <h3 class="CloseBtbRed" onclick="closeAlerbar()" style="color: red;cursor:pointer">&times;</h3>
        <h3>Please Call to our Service Center To confirm your Order</h3>
        <a href="tel:0192940449">
            <img style="max-width: 200px;" src="./assets/images/callong.gif" alt="Calling">
        </a>
        <h4><i class="fas fa-phone"></i> 0138849394059</h4>
    </div>
</div>

<section class="single-product" id="single-product">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="product-img">
                    <img class="img-fluid" src="assets/images/post/<?php echo $rowCat['cover'] ?>" alt="product image" />
                    <a class="img-popup" href="assets/images/post/<?php echo $rowCat['cover'] ?>" alt="product image"></a>
                </div>

            </div>
            <div class="col-12 col-lg-6">
                <div class="product-content">
                    <div class="product-title">
                        <h3><?php echo $rowCat['title'] ?></h3>
                    </div>
<!-- 
                    <div class="product-price">
                        <span>150W maximum power. High Efficiency Poly-crystalline Solar Module</span>
                    </div> -->

                    <div class="product-desc">
                        <p><?php echo $rowCat['description'] ?></p>
                    </div>

                    <div class="product-action">
                        <a class="btn btn--primary justify-content-center m-2" href="./assets/pdf/<?php echo $rowCat['pdf'] ?>">Learn More</a>
                        <a onclick="OpenAlerbar()" class="btn btn--secondary justify-content-center m-2" href="#">Buy Now</a>
                    </div>

                    <div class="product-details">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="name">SKU:</td>
                                    <td class="value">avilable</td>
                                </tr>
                                <tr>
                                    <td class="name">category:</td>
                                    <td class="value"><?php echo $rowCat['category'] ?></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>


        </div>

    </div>
    </div>

</section>

<section>
    <div class="ProductConfig">
        <div class="FeatureOfProduct">
            <div class="iconOfFeature">
                <div class="iconBorderTools">
                    <i class="fas fa-shield-alt"></i>
                </div>
            </div>
            <p>Safe & Reliable</p>
        </div>
        <div class="FeatureOfProduct">
            <div class="iconOfFeature">
                <div class="iconBorderTools">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
            </div>
            <p>High Revenue</p>
        </div>
        <div class="FeatureOfProduct">
            <div class="iconOfFeature">
                <div class="iconBorderTools">
                    <i class="fas fa-tools"></i>
                </div>
            </div>
            <p>Easy to use</p>
        </div>
    </div>
</section>

<!-- <section>
    <div class="safeFeeDiv">
        <div class="featurePicDiv">
            <img src="assets/images/product/soler.png" alt="">
        </div>
        <div class="FeaterDescriotion">
            <h3>BENEFITS</h3>
            <p>High and stable conversion efficiency based an over 8 years professional experience.</p>
            <p>High reliability with guaranteed 0 - +3% output power tolerance.</p>
            <p>Proven materials tempered front glass, and a sturdy anodized aluminum
{rame allow modules to operate raliably in mutiple mountly configuration</p>
            <p>Combination of high efficiency and attractive appearance</p>
        </div>
    </div>
</section>

<section>
    <div class="safeFeeDiv" style="flex-direction: row-reverse;">
        <div class="featurePicDiv">
            <img src="assets/images/product/soler.png" alt="">
        </div>
        <div class="FeaterDescriotion middleRev">
            <div class="w-100 middlDivISSHi" style="display: inline-block">
                <h3>QUALITY AND SAFETY</h3>
                <p>25.year output power warranty</p>
                <p>1S09001:2008 (Qualty Management System) certified factory</p>
                <p>1E061215, Safety tested IEC61730,CE</p>
                <p>Product Quality Warranty & Product Liability Insurance guarantee end
users benefit</p>
            </div>
        </div>
    </div>
</section>

 <section>
    <div class="safeFeeDiv">
        <div class="featurePicDiv">
            <img src="assets/images/shop/full/1.jpg" alt="">
        </div>
        <div class="FeaterDescriotion">
            <h3>TEMPERATURE COEFFICIENTS</h3>
            <p>Adapt to complex power grid</p>
            <p>High reliability due to good heat dissipation design</p>
            <p>Integrated lightning protection for both DC and AC</p>
            <p>High anti-corrosion ability with aluminum alloy die casting technology</p>
            <p>IP66, wider working temperature and altitude, adapt to various installation environments</p>
        </div>
    </div>
</section>

<section>
    <div style="width: 100%;">
        <img style="width: 100%;" src="./assets/catelog/DataSheet SL series - 130-150W.jpg" alt="">
    </div>
</section> -->

<script>
    function closeAlerbar(){
        var selectDiv = document.querySelector('.BuyAction');
        selectDiv.classList.add('disNone');
    }
    function OpenAlerbar(){
        var selectDiv = document.querySelector('.BuyAction');
        var selectDivAlert = document.querySelector('.alerDivForSells');
        selectDiv.classList.remove('disNone')
        selectDivAlert.classList.add('addNamim')
    }
</script>
<?php
  }else{
      echo '<br><br><br><div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Sorry!</strong> No Products Found.
    </div><br><br><br>';
  }
include('./footer.php');
?>