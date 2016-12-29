<?php
include 'php/view/header.php';
include 'php/model/database.php';
include 'php/model/category_md.php';
include 'php/model/resume_md.php';
include 'php/model/feedback_md.php';
include 'php/controller/index_cr.php';
?>
<nav class="navbar navbar-default">
    <div class="container">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true" ></span></a></li>
      </ul>
      <form class="navbar-form navbar-left">
            <div class="form-group">
                <select name="category" class="form-control" id="category_filter">
                <option value="-1">All Resumes</option>
                <?php
                    foreach($categories as $category){
                        echo "<option value=".$category['id']." ".($category_filter==$category["id"]?"selected":"").">".$category['name']."</option>";
                    }
                ?>
                </select>
            </div>
        </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="post.php">Post</a></li>
      </ul>
    </div>
</nav>
<div class="container">
    <?php
        foreach($resumes as $resume){
            print "<div class='row'>";
            print "<div class='col-xs-12 category'>";
            print $resume["category_name"];
            print "</div></div>";

            $pdf_view_url = $pdf_viewer."?file=".$base_url."/".$resume["url"];
            print "<div class='row'>";
            print "<div class='col-xs-12 col-md-4'>";
                print "<iframe src='$pdf_view_url' height='450' class='index-pdf'></iframe>";
            print "</div>";
            print "<div class='col-xs-12 col-md-6 index-feedback'>";
                $feedback = get_feedback_from_resume($resume["id"]);
                foreach($feedback as $comment){
                    echo "<div class='well well-sm feedback'>";
                    echo nl2br($comment["text"]);
                    echo "</div>";
                }

            $resume_url = "resume.php?id=".$resume["url_id"];
            print "<a href='$resume_url'";
            print "<button type='button' class='btn btn-primary view-and-comment'>View & Comment</button>";
            print "</a>";

            print "</div>";
            print "</div>";
        }
    ?>
</div>
<script src="js/index.js"></script>
<?php
$db = null;
include 'php/view/footer.php';
?>


