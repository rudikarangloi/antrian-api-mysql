<?php

require_once 'connect.php';

$query = "SELECT * FROM notif ORDER BY id_notif DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$response = array();
while( $row = mysqli_fetch_assoc($result) ){
    array_push($response, 
    array(
            'id_notif'=>$row['id_notif'], 
            'messages'=>$row['messages']
    ) 
);
}


$netJSON = json_encode($response[0], JSON_FORCE_OBJECT);
echo $netJSON;




?>