<?php
    include_once 'session.php';
    include_once 'sql.php';
    
    $lat = 0;
    $long = 0;
    $radius = 5000;
    
    $llat = $lat - $radius;
    $ulat = $lat + $radius;
    $llong = $long - $radius;
    $ulong = $long + $radius;
    
    $conn['queryBlobs']->bind_param("dddd", $llat, $ulat, $llong, $ulong);
    $conn['queryBlobs']->execute();
    $conn['queryBlobs']->bind_result($id,$lat,$long,$user,$amount,$charityid);
    
    $result['data'] = array();
    while($conn['queryBlobs']->fetch())
    {
        $record['id'] = $id;
        $record['lat'] = $lat;
        $record['long'] = $long;
        $record['name'] = $user;
        $record['amount'] = $amount;
        $record['charityid'] = $charityid;
        array_push($result['data'], $record);
    }
    echo json_encode($result);
?>