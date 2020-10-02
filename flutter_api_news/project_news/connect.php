<?php
$connect = new mysqli("localhost","root","","project_news");

if($connect) {
	//echo "Conection Successfull";
} else {
	echo "Connection Failed";
	exit();
}