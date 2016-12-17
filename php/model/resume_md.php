<?php
function add_resume($category,$file, $url_id){
    global $db;
    $query = "INSERT INTO resume (url, category,url_id, created_date)
            VALUES (:url,:category, :url_id, now())";
    $statement = $db ->prepare($query);
    $statement->bindValue(":url", $file);
    $statement->bindValue(":category", $category);
    $statement->bindValue(":url_id", $url_id);
    $statement->execute();
    $statement->closeCursor();
}

function get_resume($url_id){
    global $db;
    $query = "SELECT * FROM resume
            WHERE url_id=:url_id";
    $statement = $db ->prepare($query);
    $statement->bindValue(":url_id", $url_id);
    $statement->execute();
    $resume = $statement->fetch();
    $statement->closeCursor();
    return $resume;
}

function get_resumes(){
    global $db;
    $query = "SELECT r.id as id, r.url as url, r.url_id, c.name as category_name FROM resume r
            INNER JOIN category c ON r.category = c.id
            ORDER BY created_date DESC";
    $statement = $db ->prepare($query);
    $statement->execute();
    $resumes = $statement->fetchAll();
    $statement->closeCursor();
    return $resumes;
}

function get_resumes_from_category($category){
    global $db;
    $query = "SELECT r.id as id, r.url as url, r.url_id, c.name as category_name FROM resume r
            INNER JOIN category c ON r.category = c.id
            WHERE category=:category
            ORDER BY created_date DESC";
    $statement = $db ->prepare($query);
    $statement->bindValue(":category", $category);
    $statement->execute();
    $resumes = $statement->fetchAll();
    $statement->closeCursor();
    return $resumes;
}

?>
