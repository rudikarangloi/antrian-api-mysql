<?php


	
	
	require_once 'connect.php';
	
    
	$kodeBooking    = $_POST['kodeBooking'];
	$waktu_booking 	= $_POST['waktu_booking'];
	
	$filter_waktu   = " AND DATE(waktu) = '". $waktu_booking ."'" ;	
	$filter_waktu_detail   = " AND DATE(antrianDate) = '". $waktu_booking ."'" ;			
		
	$str_check =  "Not OK";	
	$query = " SELECT count(*) as count FROM data_antrian WHERE status=2 AND kodebooking = '$kodeBooking' ". $filter_waktu;
	$result = mysqli_query($conn, $query);  
    while( $row = mysqli_fetch_assoc($result) ){		
				
		if($row['count']>0){
			$str_check =  "Not OK";	
		}else{
			$sql = "DELETE FROM data_antrian WHERE kodebooking = '$kodeBooking' ". $filter_waktu;
			if(mysqli_query($conn,$sql)){		
				$str_check =  "OK";					
			}
			$sql = "DELETE FROM data_antrian_detail WHERE kodeBooking = '$kodeBooking' ". $filter_waktu_detail;
			if(mysqli_query($conn,$sql)){		
				$str_check =  "OK";					
			}
		}		
		   
    }
	
	echo $str_check;
	
	
	
	
	
	




?>