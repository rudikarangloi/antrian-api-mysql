<?php


if(isset($_POST['noPendaftaran'])){
	
	$noPendaftaran  = $_POST['noPendaftaran'];
	require_once 'connect.php';
	$data = array();	
	
	$sql="SELECT * FROM tc_mr WHERE FS_MR = '$noPendaftaran' ";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0)	
	{	
		$result2 = mysqli_query($conn, $sql);		
		while( $row = mysqli_fetch_assoc($result2) ){		
			$FS_NM_PASIEN   = $row['FS_NM_PASIEN']  ;	
			$FS_ALM_PASIEN  = $row['FS_ALM_PASIEN']  ;						
		}		
		$result = 	$FS_NM_PASIEN.'***'.$FS_ALM_PASIEN;
    	//$data['result'] = 'true';
    	//$data['msg'] = 'Data ditemukan';
		//$data['namaPasien'] = $FS_NM_PASIEN;
		//$data['alamatPasien'] = $FS_ALM_PASIEN;	
	}else{		 
		//$data['result'] = 'false';
    	//$data['msg'] = 'Data ditemukan';   
		$result =	'false';	
	}
	
}else{	
	//$data['result'] = 'false';
    //$data['msg'] = 'Data belum lengkap'; 
	$result =	'false';
}

//echo json_encode($data);
echo $result;


?>