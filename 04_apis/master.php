<?php
  class apis{
    private $host = "db.home.gdb.kr";
    private $dbname = "home";
    private $user = "root";
    private $pw = "*************";
    private $conn;

    public function __construct(){
      $this->conn = mysqli_connect($this->host,$this->user,$this->pw,$this->dbname);
    }
    private function feed(){
      try{
        system("sudo python ./feed.py");
      } catch (Exception $e){
        echo "<script>alert('실패');location.href='/';</script>";
      }
    }
    private function start(){
    }
  }

?>
