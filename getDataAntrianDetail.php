<?php 

require_once 'connect.php';


if(isset($_POST['nik'])){

    $nik        = $_POST['nik'];      
    //$tanggal_hari_ini = date("Y-m-d");
    
	$query = " SELECT * FROM data_antrian_detail WHERE nik = '".$nik."' AND CURDATE() <=  DATE(antrianDate)  ";   
    $result = mysqli_query($conn, $query);
    $rowClient = mysqli_fetch_assoc($result);	
    if($rowClient['nik']){
        $json['msg'] = 'success';
		$json['nama'] = $rowClient['nama'];		
		$json['data'] = $rowClient;
    }else{
        $json['msg'] = 'failed';
    }

}else{
    $json['msg'] = 'incomplete';
}

echo json_encode($json);	

?>