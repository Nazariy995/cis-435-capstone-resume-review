<?php
include 'php/view/header.php';
include 'php/model/database.php';
include 'php/model/category_md.php';
include 'php/model/resume_md.php';
include 'php/model/feedback_md.php';
include 'php/controller/resume_cr.php';
?>
<script src="js/resume.js"></script>
<nav class="navbar navbar-default">
    <div class="container">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true" ></span></a></li>
      </ul>
        <p class="navbar-text navbar-left"><?php print $category["name"] ?></p>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="post.php">Post</a></li>
      </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-xs-12" >
        <iframe src="<?php print $pdf_view_url ?>" align="middle" height="515" class="resume-pdf"></iframe>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
             <form name="feedbackForm" action="" method="post" onsubmit="return(validate())" class="feedback">
                <div class="form-group">
                    <label for="feedback">Feedback</label>
                    <textarea class="form-control" name="feedback" value="<?php print $feedback_text; ?>"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary" value="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <?php
            foreach($feedback as $comment){
                echo "<div class='well well-sm feedback'>";
                echo $comment["text"];
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>
<?php
$db = null;
include 'php/view/footer.php';
?>


