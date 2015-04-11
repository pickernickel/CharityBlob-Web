<?php
    include_once 'session.php';
    include_once 'sql.php';
    
    $conn['queryCharities']->execute();
    $conn['queryCharities']->bind_result($id,$name,$color);
    
    $result['data'] = array();
    while($conn['queryCharities']->fetch())
    {
        $record['id'] = $id;
        $record['name'] = $name;
        $record['color'] = $color;
        array_push($result['data'], $record);
    }
    echo json_encode($result);
?>