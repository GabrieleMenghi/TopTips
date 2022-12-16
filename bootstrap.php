<?php

session_start();
require("database/database.php");
define("UPLOAD_DIR","./upload/");
$dbh = new databaseHelper("localhost","root","","toptips",3306);

?>