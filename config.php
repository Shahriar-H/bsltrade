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
   
 

    function getAllProjectList($sql){
        $allData  = $this->connected->query($sql);
        return $allData;
    }
   
    

}




?>