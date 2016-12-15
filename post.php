<?php
include 'php/view/header.php';
include 'php/model/database.php';
include 'php/model/category_md.php';
?>
<script src="/js/post.js"></script>
<nav class="navbar navbar-default">
    <div class="container">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true" ></span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Post</a></li>
      </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <form name="postForm" action="" onsubmit="return(validate())">
            <div class="form-group">
                <label for="category">Select Category</label>
                <select name="category" class="form-control">
                <?php
                    $categories = get_categories();
                    foreach($categories as $category){
                        echo "<option value=".$category['id'].">".$category['name']."</option>";
                    }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fileUpload">Select File</label>
                <input type="file" class="form-control-file" name="fileUpload" accept="application/pdf">
                <small class="form-text text-muted">Only PDF files are accepted</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<?php
$db = null;
include 'php/view/footer.php';
?>
