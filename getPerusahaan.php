<?php


if(isset($_POST['noPerusahaan'])){
	
	$noPerusahaan  = $_POST['noPerusahaan'];
	require_once 'connect.php';
	$data = array();	
	
	$SyT ="WHERE $SrT (FS_KD_JAMINAN LIKE '%$noPerusahaan%' OR FS_NM_JAMINAN LIKE '%$noPerusahaan%')";
	$sql="SELECT FS_KD_JAMINAN, FS_NM_JAMINAN FROM ta_jaminan $SyT ORDER BY FS_KD_JAMINAN";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0)	
	{	
		$result2 = mysqli_query($conn, $sql);		
		while( $row = mysqli_fetch_assoc($result2) ){		
			$FS_KD_JAMINAN   = $row['FS_KD_JAMINAN']  ;	
			$FS_NM_JAMINAN  = $row['FS_NM_JAMINAN']  ;						
		}		
		$result = 	$FS_KD_JAMINAN.'***'.$FS_NM_JAMINAN;
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