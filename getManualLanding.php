<?php


if(isset($_POST['noinfo'])){
	
	$noinfo  = $_POST['noinfo'];
	require_once 'connect.php';
	$data = array();	
	
	$sql="SELECT * FROM info_manual  ";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0)	
	{	
		$result2 = mysqli_query($conn, $sql);		
		while( $row = mysqli_fetch_assoc($result2) ){		
			$informasi   = $row['informasi']  ;									
		}		
		$result = 	$informasi ;
    	
	}else{		
		$result =	'false';	
	}
	
}else{		
	$result =	'false';
}

echo $result;


?>