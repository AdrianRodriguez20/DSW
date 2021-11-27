<?php 
class Connection{
    
    private $host, $user , $pass, $database , $charset;

    public function __construct(){
        $db_cfg = require_once 'config/database.php';
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];
 
    }
    public function connect(){
     global $conn;
     $conn= new mysqli($this->host, $this->user, $this->pass, $this->database);
     $resultado=$conn->query("SET NAMES '".$this->charset."'");
   
     return $conn;

    }

    public function disconnect(){
    global $conn;
    mysqli_close($conn);
    }
    
}

?>