<?php 

$connect = new mysqli("localhost","proiso","ra11-19","flutter_api_news");

if($connect){
    echo "Connection successfull";
}else{
    echo "Connection failed";
    exit();
}

?>