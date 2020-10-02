<?php

//if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	
	require_once 'connect.php';
	
    //$loket  = $_POST['loket'];
	$loket  = 7;
	
	//
	$model_antrian = 0;
	$filter_waktu = " AND DATE(waktu) = CURDATE() ";
		
	$query = " SELECT count(*) as count FROM data_antrian WHERE id ".$filter_waktu ;
    $result = mysqli_query($conn, $query);
    $response = array();
    while( $row = mysqli_fetch_assoc($result) ){
		
				
		if($row['count']>0){
			$jmlCountId = (int)$row['count'] + 1 ;
		}else{
			$jmlCountId = 1;
		}		
		   
    }
	
	$waktu      = date("Y-m-d H:i:s");
	$status     = '3';
	$input_from = 'hp';
	
	// Cek Kuota dan Jumlah pasien
	$query = " SELECT kuota_hp FROM client_antrian WHERE client = $loket " ;
    $result = mysqli_query($conn, $query);
    $response = array();
    while( $row = mysqli_fetch_assoc($result) ){				
		$jmlKouta= $row['kuota_hp']  ;				   
    }
	
	$query = " SELECT count(*) as count FROM data_antrian WHERE id ". $filter_waktu . " AND counter = '$loket' AND input_from = '$input_from'";
    $result = mysqli_query($conn, $query);
    $response = array();
    while( $row = mysqli_fetch_assoc($result) ){		
		$jmlPasien = $row['count']  ;			   
    }
	
	//End  Cek Kuota dan Jumlah pasien
	
		
	if($jmlPasien >= $jmlKouta) {
		echo "Pendaftaran sudah melebihi kuota";		
	}else{
		
		$sql = "INSERT INTO data_antrian SET 
	            counter    = '$loket',
	            waktu      = '$waktu',
	            status     = '$status',
				input_from = '$input_from',
				nomor      = '$jmlCountId'
				";
	
		if(mysqli_query($conn,$sql)){
			echo $jmlCountId;;
		}else{
			echo "Gagal Insert Data";	
		}
	
	}
	
	
//}



?>