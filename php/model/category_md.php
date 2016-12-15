<?php
function get_categories(){
    global $db;
    $query = 'Select * FROM category
            ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function get_category($id){
    global $db;
    $query = 'Select * FROM category
            WHERE id=:id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    return $category;
}
?>
