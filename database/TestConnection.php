<?php
require_once "DbConnection.php";

// Begin
$dbConn = new DbConnection();
if($dbConn->connect()){
    echo "Connect to database successful.";
} else {
    echo "Connect to database fail. Message: <br>".$dbConn->getErrorMsg();
}

?>