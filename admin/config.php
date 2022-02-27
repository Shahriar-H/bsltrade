<?php 

class db{
    public $database = 'bsl';
    public $username = 'root';
    public $password = '';
    public $host = 'localhost';
    public $connected;
    function __construct(){
        $this->connected = new mysqli($this->host,$this->username, $this->password, $this->database);
        if($this->connected->connect_error){
            die("Connection Failed:".$this->connected->connect_error);
        }
    }
    function UploadPost($sql){
        $success = $this->connected->query($sql);
        if($success==TRUE){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucess!</strong> The project is now in online.
          </div>';
        }else{
            echo $this->connected->error;
        }
    }
    function UpdatePost($sql){
        $success = $this->connected->query($sql);
        if($success==TRUE){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucess!</strong> The project is Updated.
          </div>';
        }else{
            echo $this->connected->error;
        }
    }

    function StringFillter($str){
        return mysqli_real_escape_string($this->connected,$str);
    }

    function UploadPhoto($photo){
        $photoName = $photo['name'];
        $AlowType = array('jpg','jpeg','png');
        $fileExArr = explode('.',$photoName);
        $fileType = end($fileExArr);
        if(in_array($fileType,$AlowType)){
            $tmp_name = $photo['tmp_name'];
            $location = '../assets/images/post/';
            $fileNewname = time().$photoName;
            move_uploaded_file($tmp_name,$location.$fileNewname);
            return $fileNewname;
        }else{
            echo 'This not a Photo';
            return false;
        }
    }
    function UploadPDF($photo){
        $photoName = $photo['name'];
        $AlowType = array('pdf');
        $fileExArr = explode('.',$photoName);
        $fileType = end($fileExArr);
        if(in_array($fileType,$AlowType)){
            $tmp_name = $photo['tmp_name'];
            $location = '../assets/pdf/';
            $fileNewname = time().$photoName;
            move_uploaded_file($tmp_name,$location.$fileNewname);
            return $fileNewname;
        }else{
            echo 'This not a PDF';
            return false;
        }
    }

    function getAllProjectList($sql){
        $allData  = $this->connected->query($sql);
        return $allData;
    }
    function DeleteData($sql,$img,$pdf){
        $isSuccess = $this->connected->query($sql);
        if($isSuccess==TRUE){
            if($img!=''){
                unlink('../assets/images/post/'.$img);
            }
            if( $pdf!=''){
                unlink('../assets/pdf/'.$pdf);
            }
            
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> The project is Deleted.
                </div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Failed!</strong> The project is Not Deleted.
                </div>';
        }
    }
    
    

}


?>