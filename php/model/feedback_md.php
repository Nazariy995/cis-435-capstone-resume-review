<?php
function get_feedback_from_resume($resume){
    global $db;
    $query = 'Select * FROM feedback
            WHERE resume = :resume
            ORDER BY created_date DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(":resume", $resume);
    $statement->execute();
    $feedback = $statement->fetchAll();
    $statement->closeCursor();
    return $feedback;
}

function add_feedback_for_resume($resume,$feedback){
    global $db;
    $query = "INSERT INTO feedback (text, resume, created_date)
            VALUES (:text, :resume, now())";
    $statement = $db ->prepare($query);
    $statement->bindValue(":text", $feedback);
    $statement->bindValue(":resume", $resume);
    $statement->execute();
    $statement->closeCursor();
}



?>
