<?php
  class apis{
    private $host = "db.home.gdb.kr";
    private $dbname = "feed";
    private $user = "root";
    private $pw = "*************";

    public function __construct(mod){
      if(!isset($_SESSION['id'])) die();
      switch(mod){
        case "feed":
          $this->feed();
          break;
        case "start":
          $this->run();
          break;
      }
    }
    private function feed(){
      $connection = mysqli_connect($this->host, $this->dbname, $this->user, $this->pw);
      $sql = "";
      mysqli_connect($connection,$sql);
    }
    private function start(){
      $connection = mysqli_connect($this->host, $this->dbname, $this->user, $this->pw);
      $sql = "";
      mysqli_connect($connection,$sql);
      system("sudo python motor.py");

    }
  }

?>
