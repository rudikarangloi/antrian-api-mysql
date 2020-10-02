<?php


	
	
	require_once 'connect.php';
	
    
	$kodeBooking    = $_POST['kodeBooking'];
	$waktu_booking 	= $_POST['waktu_booking'];
	
	$filter_waktu   = " AND DATE(waktu) = '". $waktu_booking ."'" ;				
	
	$query = " SELECT count(*) as count FROM data_antrian WHERE status=2 AND kodebooking = '$kodeBooking' ". $filter_waktu;
	$result = mysqli_query($conn, $query);  
    while( $row = mysqli_fetch_assoc($result) ){		
				
		if($row['count']>0){
			$str_check =  "Called";	
		}else{
			$str_check =  "Not Called Yet";	
		}		
		   
    }
	
	echo $str_check;
	
	
	
	
	
	




?>