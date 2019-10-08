<?php
/**
 * Created by PhpStorm
 * User: amkeith
 * Date: 10/6/2019
 * Time: 10:51 pm
 */
$pagetitle = "Upload Files";
include_once "header.php";

if(isset($_POST["submit"])) {
$target_dir = "amkeith/cycle3/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($filetype != "doc" && $filetype != "docx" && $filetype != "pptx" ) {
        echo "Sorry, only Word Documents and Powerpoint files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded. <br /><br />";
    // if everything is ok, try to upload file
    } else {
        // check the path
        //echo $target_file;
        $sql = "INSERT INTO studentfiles (username, assignment, filetype) VALUES (:username, :assignment, :filetype) ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':username', $_SESSION['username']);
        $stmt->bindValue(':assignment', $target_file);
        $stmt->bindValue(':filetype', $filetype);
        $stmt->execute();
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.<br /><br />";
        } else {
            echo "The File Has been uploaded!<br /><br />";
        }
    }
}
?>
    <html>
    <body>

    <form action="storage.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Assignment" name="submit">
    </form>

    </body>
    </html>
<?php
include_once "footer.php";
?>