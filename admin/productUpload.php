<?php 


if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}
    include('./config.php');
    $obj = new db();
    if(isset($_POST['savePost'])){
        $title = $obj->StringFillter($_POST['title']);
        $shortDes = $obj->StringFillter($_POST['shortDes']);
        $category = $obj->StringFillter($_POST['category']);
        $cover = $obj->UploadPhoto($_FILES['cover']);
        $PdfFileIS = $obj->UploadPDF($_FILES['pdfFile']);
        $subCat = $obj->StringFillter($_POST['subCat']);
        $postProjectSql = "INSERT INTO `products` (`title`,`category`,`cover`,`pdf`,`description`,`subcat`) VALUES ('$title','$category','$cover','$PdfFileIS','$shortDes','$subCat')";
        $obj->UploadPost($postProjectSql);
    }

?>
<div class="ProjectContainer">
    <div class="menuBarShort">
        <a  style="margin-right: 10px; padding:5px 10px; background-color:grey" href="index.php?page=allproducts">All Products</a>
        <a  style="margin-right: 10px; padding:5px 10px;background-color:grey" href="index.php?page=category">Add Category</a>
    </div>
    <div class="projectRow">
        <form action="index.php?page=product" method="POST" enctype="multipart/form-data" >
            <div class="labelAndInputF">
                <label>Products' Title-</label><br>
                <input required type="text" name="title" placeholder="Projects title goes here">
            </div>
            <div class="labelAndInputF">
                <label>Products' Category-</label><br>
                <input required type="text" name="category" placeholder="solar,light">
            </div>
            <div class="labelAndInputF">
                <label>Sub-category of-</label><br>
                <select style="width: 100%; padding:10px;background-color:white; border:1px solid grey" name="subCat">
                    <option value="null">None</option>
                    <?php 
                        $sqlCat="SELECT * FROM category";
                        $cat = $obj->getAllProjectList($sqlCat);
                        if($cat->num_rows>0){
                            while($rowCat=$cat->fetch_array()){
                    ?>
                        <option value="<?php echo $rowCat['name'] ?>"><?php echo $rowCat['name'] ?></option>
                    <?php 
                        }}
                    ?>
                </select>
            </div>
            <div class="labelAndInputF">
                <label>Products' Photo-</label><br>
                <input required type="file" name="cover" placeholder="Projects title goes here">
            </div>
            <div class="labelAndInputF">
                <label>Products' PDF-</label><br>
                <input required type="file" name="pdfFile">
            </div>
            <div class="labelAndInputF">
                <label>Products' Short Description-</label><br>
                <input required type="text" name="shortDes" placeholder="short description goes here">
            </div>
            <input class="sbtnButon" type="submit" name="savePost" value="Publish">
        </form>
    </div>
</div>