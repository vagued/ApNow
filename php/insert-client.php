<?php

require_once('dbConnect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

$extension = pathinfo($_FILES["pic"]["name"],PATHINFO_EXTENSION);

// echo "INSERT INTO clients (username, password, firstname, lastname, email)
//   VALUES ('$username','$password','$firstname','$lastname','$email')";

// An insertion query. $result will be `true` if successful
$result = db_query("INSERT INTO clients (username, password, firstname, lastname, email, extension)
  VALUES ('$username','$password','$firstname','$lastname','$email','$extension')");

if($result === false)
    echo "Failed to insert\n";

//Photo upload

$result = db_query("SELECT MAX(idclient) FROM clients");

$numbering = mysqli_fetch_assoc($result);

$target_dir = "../img/clients/" . $numbering["MAX(idclient)"];

$target_file = $target_dir . '.' . $extension;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["pic"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

echo '<script>';
echo 'window.location.href = "../html/login.html";';
echo '</script>';

?>
