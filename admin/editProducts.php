<?php 


if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}
    include('./config.php');
    $obj = new db();
    if(isset($_GET['ide'])){
        $id=$_GET['ide'];
        $sqlSel = "SELECT * FROM products WHERE id=$id";
        $selRow = $obj->getAllProjectList($sqlSel);
        if($selRow->num_rows>0){
            $rows = $selRow->fetch_array();
        }else{
            die();
        }
    }
    if(isset($_POST['savePost'])){
        $id=$_GET['ide'];
        $title = $obj->StringFillter($_POST['title']);
        $shortDes = $obj->StringFillter($_POST['shortDes']);
        $category = $obj->StringFillter($_POST['category']);
        if($obj->UploadPhoto($_FILES['cover'])){
            $cover = $obj->UploadPhoto($_FILES['cover']);
        }else{
            $cover = $obj->StringFillter($_POST['coverold']);
        }

        if($obj->UploadPDF($_FILES['pdfFile'])){
            $PdfFileIS = $obj->UploadPDF($_FILES['pdfFile']);
        }else{
            $PdfFileIS = $obj->StringFillter($_POST['pdfFileold']);
        }

        $subCat = $obj->StringFillter($_POST['subCat']);
        $postProjectSql = "UPDATE `products` SET `title`='$title',`category`='$category',`cover`='$cover',`pdf`='$PdfFileIS',`description`='$shortDes',`subcat`='$subCat' WHERE id=$id";
        $obj->UpdatePost($postProjectSql);
        header('location: index.php?page=allproducts');
    }



?>
<div class="ProjectContainer">
    <div class="menuBarShort">
        <a  style="margin-right: 10px; padding:5px 10px; background-color:grey" href="index.php?page=allproducts">All Products</a>
        <a  style="margin-right: 10px; padding:5px 10px;background-color:grey" href="index.php?page=category">Add Category</a>
    </div>
    <div class="projectRow">
        <form action="index.php?page=editproduct&ide=<?php echo $rows['id'] ?>" method="POST" enctype="multipart/form-data" >
            <div class="labelAndInputF">
                <label>Products' Title-</label><br>
                <input required type="text" name="title" value="<?php echo $rows['title'] ?>">
            </div>
            <div class="labelAndInputF">
                <label>Products' Category-</label><br>
                <input required type="text" name="category" value="<?php echo $rows['category'] ?>">
            </div>
            <div class="labelAndInputF">
                <label>Sub-category of-</label><br>
                <select style="width: 100%; padding:10px;background-color:white; border:1px solid grey" name="subCat">
                    <?php 
                        $sqlCat="SELECT * FROM category";
                        $cat = $obj->getAllProjectList($sqlCat);
                        if($cat->num_rows>0){
                            while($rowCat=$cat->fetch_array()){
                    ?>
                        <option
                        <?php 
                            if($rowCat['name']==$rows['subcat']){
                                echo "selected";
                            }
                        ?>
                        value="<?php echo $rowCat['name'] ?>"><?php echo $rowCat['name'] ?></option>
                    <?php 
                        }}
                    ?>
                </select>
            </div>
            <div class="labelAndInputF">
                <label>Products' Photo-</label><br>
                <input  type="file" name="cover" placeholder="Projects title goes here">
                <input  type="hidden" name="coverold" value="<?php echo $rows['cover'] ?>">

            </div>
            <div class="labelAndInputF">
                <label>Products' PDF-</label><br>
                <input  type="file" name="pdfFile">
                <input  type="hidden" name="pdfFileold" value="<?php echo $rows['pdf'] ?>">
            </div>
            <div class="labelAndInputF">
                <label>Products' Short Description-</label><br>
                <input required type="text" name="shortDes" value="<?php echo $rows['description'] ?>">
            </div>
            <input class="sbtnButon" type="submit" name="savePost" value="Publish">
        </form>
    </div>
</div>