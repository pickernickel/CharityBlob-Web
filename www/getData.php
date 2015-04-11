<?php
    include_once 'session.php';
    include_once 'sql.php';
    
    $lat = $_GET['lat'];
    $long = $_GET['long'];
    $radius = $_GET['radius'];
    
    $llat = $lat - $radius;
    $ulat = $lat + $radius;
    $llong = $long - $radius;
    $ulong = $long + $radius;
    
    $conn['queryBlobs']->bind_param("dddd", $llat, $ulat, $llong, $ulong);
    $conn['queryBlobs']->execute();
    $conn['queryBlobs']->bind_result($id,$lat,$long,$user,$amount,$charityid);
    
    $result = array();
    while($conn['queryBlobs']->fetch())
    {
        array_push($result, array($id,$lat,$long,$user,$amount,$charityid));
    }
    echo json_encode($result);
?>