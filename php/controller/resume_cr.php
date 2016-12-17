<?php
$base_url = "http://".$_SERVER['SERVER_NAME'];
$pdf_viewer = $base_url."/pdf_viewer/web/viewer.html";

$resume_id = -1;
$feedback_text = "";
if(!empty($_GET)){
    $resume_id = $_GET["id"];
    $resume = get_resume($resume_id);
} else {
    $db = null;
    header("Location: .");
}

if(!empty($_POST["submit"]) && ($_POST['submit']=="submit")){
    $feedback_text = $_POST["feedback"];
    try{
        add_feedback_for_resume($resume["id"] ,$feedback_text);
        $feedback_text = "";
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    } catch(Exception $e){
        $error = "Something went wrong. Pleae try again!";
    }
}

try {
    $category = get_category($resume["category"]);
    $pdf_view_url = $pdf_viewer."?file=".$base_url."/".$resume["url"];
    $feedback = get_feedback_from_resume($resume["id"]);
} catch (Exception $ex){
    $db = null;
    header("Location: .");
}
?>
