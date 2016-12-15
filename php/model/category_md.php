<?php
function get_categories(){
    global $db;
    $query = 'Select * FROM category
            ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}
?>
