<?php
	
	$noinfo  = $_POST['noinfo'];
	require_once 'connect.php';
	$data = array();	
	$response = array();
	
	$sql="SELECT * FROM info  ";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0)	
	{	
		$result2 = mysqli_query($conn, $sql);		
		while( $row = mysqli_fetch_assoc($result2) ){		
			$informasi   = $row['informasi']  ;									
		}		
		$result = 	$informasi ;
		
		$data['status'] = true;
		$data['msg'] = $informasi;
    	
	}else{		
		$result =	'false';	
		$data['status'] = false;
		$data['msg'] = 'No Info';
	}
	
	

echo json_encode($data);  


?>