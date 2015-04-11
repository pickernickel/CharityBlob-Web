<?php
    include_once 'session.php';
    
    $host = "localhost";
	$username = "root";
	$pass = "root";
	$database = "charity";
    
    function getConn()
    {
        static $conn;
        if(!$conn)
        {
            $host = "localhost";
            $username = "root";
            $pass = "root";
            $database = "charity";
            
            $conn['conn'] = new mysqli("p:".$host, $username, $pass, $database);
            if(mysqli_connect_errno())
            {
                die();
            }
            $conn['queryBlobs'] = $conn['conn']->prepare("SELECT * FROM blobs
                                                            WHERE (latitude BETWEEN ? AND ?)
                                                            AND (longitude BETWEEN ? AND ?);");
            $conn['queryCharities'] = $conn['conn']->prepare("SELECT `charities`.`id`,`charities`.`name`,`charities`.`color` FROM `charity`.`charities`;");
            $conn['prepBlob'] = $conn['conn']->prepare("INSERT INTO blobs VALUES (default,?,?,?,?,?);");
            echo htmlspecialchars($conn['conn']->error);
        }
        return $conn;
    }
    
    $conn = getConn();
?>