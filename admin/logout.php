<?php 

session_start();
if(!isset($_SESSION['email'])){
    header("location: ./index.php");
}else{
    session_start();
    session_destroy();
    session_unset();
    header("location: ./login.php");
}

?>


?>