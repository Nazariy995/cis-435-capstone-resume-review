<?php
$base_url = "http://".$_SERVER['SERVER_NAME'];
$pdf_viewer = $base_url."/pdf_viewer/web/viewer.html";

$categories = get_categories();

$category_filter = -1;

if(!empty($_GET["category"])){
    $category_filter = $_GET["category"];
}

if($category_filter > -1){
    $resumes = get_resumes_from_category($category_filter);
} else {
    $resumes = get_resumes();
}

?>
