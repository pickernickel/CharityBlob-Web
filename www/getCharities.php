<?php
    include_once 'session.php';
    include_once 'sql.php';
    
    $conn['queryCharities']->execute();
    $conn['queryCharities']->bind_result($id,$name,$color);
    
    $result = array();
    while($conn['queryCharities']->fetch())
    {
        array_push($result, array($id,$name,$color));
    }
    echo json_encode($result);
?>