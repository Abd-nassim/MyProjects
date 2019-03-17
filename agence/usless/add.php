<?php
if(   isset($_POST["upload"])   ) {

$target_dir = "attachements/";
$name =  basename($_FILES["fileToUpload"]["name"]);

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    echo' <script>alert("Sorry, file already exists.");</script>';
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo' <script>alert("Sorry, your file is too large");</script>';

    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo' <script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed");</script>';

    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo' <script>alert("Sorry, your file was not uploaded.");</script>';

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo' <script>alert("Congratulation, your file has been uploaded..");</script>';

    } else {
        echo' <script>alert("Sorry, there was an error uploading your file.");</script>';

    }
}
}
?>
