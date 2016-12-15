<?php
include 'php/view/header.php';
include 'php/model/database.php';
include 'php/model/category_md.php';
include 'php/model/resume_md.php';
include 'php/controller/resume_cr.php';
?>
<nav class="navbar navbar-default">
    <div class="container">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true" ></span></a></li>
      </ul>
        <p class="navbar-text navbar-left"><?php print $category["name"] ?></p>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Post</a></li>
      </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-xs-12" style="text-align:center">
        <iframe src="<?php print $pdf_view_url ?>" align="middle" height="515" width="600"></iframe>
        </div>
    </div>
</div>
<?php
$db = null;
include 'php/view/footer.php';
?>


