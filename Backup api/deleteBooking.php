<?php


	
	
	require_once 'connect.php';
	
    
	$kodeBooking    = $_POST['kodeBooking'];
	$waktu_booking 	= $_POST['waktu_booking'];
	
	$filter_waktu   = " AND DATE(waktu) = '". $waktu_booking ."'" ;			
		
	
	$sql = "DELETE FROM data_antrian WHERE kodebooking = '$kodeBooking' ". $filter_waktu;	           
	
	if(mysqli_query($conn,$sql)){		
		echo "OK";
	}else{
		echo "Not OK";	
	}
	
	
	
	




?>