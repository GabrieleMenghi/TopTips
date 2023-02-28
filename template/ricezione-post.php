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

$number_of_images = 2;

$msg = "";
$countfiles = count($_FILES['imagepicker']['name']);

//Controllo lunghezza filenames
if(strlen($image0) > 50){
    $image0 = substr($image0, 0, 50);
}
if(strlen($image1) > 50){
    $image1 = substr($image1, 0, 50);
}
if(strlen($image2) > 50){
    $image2 = substr($image2, 0, 50);
}
if(strlen($image0) > 50){
    $image2 = substr($image2, 0, 50);
}
 
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
//Immagine 1 (sicuramente presente)
$query0 = "INSERT INTO immagine(`filename`, `descrizione`, `votes`) VALUES (?, ?, 0)";
$stmt0 = $conn->prepare($query0);
$stmt0->bind_param('ss', $image0, $imagedescription0);
$stmt0->execute();
$image_id0 = $stmt0->insert_id;

//Immagine 2 (sicuramente presente)
$query1 = "INSERT INTO immagine(`filename`, `descrizione`, `votes`) VALUES (?, ?, 0)";
$stmt1 = $conn->prepare($query1);
$stmt1->bind_param('ss', $image1, $imagedescription1);
$stmt1->execute();
$image_id1 = $stmt1->insert_id;

//Immagine 3
if(isset($image2)){
    $number_of_images++;
    $query2 = "INSERT INTO immagine(`filename`, `descrizione`, `votes`) VALUES (?, ?, 0)";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param('ss', $image2, $imagedescription2);
    $stmt2->execute();
    $image_id2 = $stmt2->insert_id;
}

//Immagine 4
if(isset($image3)){
    $number_of_images++;
    $query3 = "INSERT INTO immagine(`filename`, `descrizione`, `votes`) VALUES (?, ?, 0)";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param('ss', $image3, $imagedescription3);
    $stmt3->execute();
    $image_id3 = $stmt3->insert_id;
}

//Inserimento su database del post
$query = "INSERT INTO post(`titolopost`, `testopost`, `datapost`, `numeroimmagini`, `img1`, `img2`, `img3`, `img4`, `utente`) 
            VALUES (?, ?, NOW(), ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('ssiiiiii', $title, $text, $number_of_images, $image_id0, $image_id1, $image_id2, $image_id3, $user);
if($stmt->execute()){
    $msg = "Post creato correttamente";
}

header("location: ../creazione-post.php?formmsg=" . $msg);

$conn->close();
?>