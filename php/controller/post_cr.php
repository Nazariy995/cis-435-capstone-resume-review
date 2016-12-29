<?php
if(!empty($_POST) && !empty($_FILES["fileUpload"])) {
    $target_dir = "uploads/";
    $category = $_POST["category"];
    $url_id = uniqid();
    $target_file = $target_dir.$url_id."_".basename($_FILES["fileUpload"]["name"]);
    $uploadOk = 1;
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "pdf") {
        $error = "Sorry, only PDF files allowed";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 1 by an error
    if($uploadOk == 1){
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
            try {
                add_resume($category, $target_file, $url_id);
                header("Location: resume.php?id=$url_id&resume_submit=true");
            } catch(Exception $ex){
                echo "Nope not working";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
