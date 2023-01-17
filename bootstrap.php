<?php

session_start();
define("UPLOAD_DIR","./upload/");
require("database/database.php");
require("utils/functions.php");
$dbh = new databaseHelper("localhost","root","","toptips",3306);

?>