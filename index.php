<?php
include 'php/view/header.php';
include 'php/model/database.php';
include 'php/model/category_md.php';
?>
<nav class="navbar navbar-default">
    <div class="container">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true" ></span></a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <select>
            <option>Test</option>
            </select>
        </div>
        </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Post</a></li>
      </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <?php
            $categories = get_categories();
            foreach($categories as $category){
                echo $category['name'];
            }
        ?>

    </div>
</div>
<?php
$db = null;
include 'php/view/footer.php';
?>


