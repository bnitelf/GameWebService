<?php
class DbConnection {
    /* Member variables */
    var $server = "localhost";
    var $dbname = "MyGameDb";
    var $user = "mygameuser";
    var $pass = "mygame1234";

    var $conn;

    var $errorMsg = "";
  
    /* Member functions */
    public function connect(){
        // Create connection
        $this->conn = new mysqli($this->server, $this->user, $this->pass, $this->dbname);

        // Check connection
        if (mysqli_connect_error()) {
           $this->errorMsg = "Database connection failed: " . mysqli_connect_error();
           return false;
        }

        $this->errorMsg = "";

        return true;
    }

    public function disconnect(){
        if(!is_null($this->conn)){
            $this->conn->close();
        }
    }

    public function getConnection(){
        return $this->conn;
    }

    public function getErrorMsg(){
        return $this->errorMsg;
    }
}
?>