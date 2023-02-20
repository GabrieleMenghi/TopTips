<?php
require_once("../bootstrap.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toptips";
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$user = $_POST["user"];
$title = $_POST["titolo"];
$text = $_POST["testopost"];
$image0 = $_POST["image0"];
$imagedescription0 = $_POST["imagedescription0"];
$image1 = $_POST["image1"];
$imagedescription1 = $_POST["imagedescription1"];
$image2 = $_POST["image2"];
$imagedescription2 = $_POST["imagedescription2"];
$image3 = $_POST["image3"];
$imagedescription3 = $_POST["imagedescription3"];

$countfiles = count($_FILES['imagepicker']['name']);

 
//Upload delle immagini
for($i=0;$i<$countfiles;$i++){
    $imageName = basename($_FILES['imagepicker']['name'][$i]);
    $fullPath = "../upload/" . $imageName;
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if (file_exists($fullPath)) {
        $j = 1;
        do{
            $j++;
            $imageName = pathinfo(basename($imageName), PATHINFO_FILENAME)."_$j.".$imageFileType;
        }
        while(file_exists("../upload/".$imageName));
        $fullPath = "../upload/".$imageName;
    }
    move_uploaded_file($_FILES['imagepicker']['tmp_name'][$i], $fullPath);
}

//Inserimento su database delle immagini

//Inserimento su database del post


$conn->close();
?>