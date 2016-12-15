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
    $query = "SELECT * FROM resume
            ORDER BY created_date";
    $statement = $db ->prepare($query);
    $statement->bindValue(":url_id", $url_id);
    $statement->execute();
    $resumes = $statement->fetchAll();
    $statement->closeCursor();
    return $resumes;
}

?>
