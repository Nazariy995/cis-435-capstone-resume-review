<?php
$base_url = "http://".$_SERVER['SERVER_NAME'];
$pdf_viewer = $base_url."/pdf_viewer/web/viewer.html";

if(!empty($_GET)){
    $resume_id = $_GET["id"];
    try {
        $resume = get_resume($resume_id);
        $category = get_category($resume["category"]);
        $pdf_view_url = $pdf_viewer."?file=".$base_url."/".$resume["url"];
    } catch (Exception $ex){
        $db = null;
        header("Location: .");
    }
} else {
    $db = null;
    header("Location: .");
}
?>
