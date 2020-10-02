<?php 

require_once 'connect.php';

if(isset($_GET['item_type'])){
	$type = $_GET['item_type'];
}else{
	$type = "MIX";
}

if(isset($_GET['counter'])){
	$counter              = $_GET['counter'];
	$filter_jenis_antrian = " AND jenis_antrian_poliklinik <> '0' ";
	$filter_counter       = " AND counter = '$counter' ";
}else{
	$counter              = "0";
	$filter_jenis_antrian = " AND jenis_antrian_poliklinik = '0' ";
	$filter_counter       = "";
}
//$filter_jenis_antrian = " AND jenis_antrian_poliklinik = '0' ";
$model_antrian        = 0;
$filter_waktu         = " AND DATE(waktu) = CURDATE() ";

//$filter_jenis_antrian = " AND jenis_antrian_poliklinik = '0' ";

/*
if($counter == "0"){
	$filter_counter       = ""
}else{
	$filter_counter       = " AND counter = '$counter' ";
}
*/

if($type=="MAX"){	
	$query = " SELECT MAX(nomor) as id FROM data_antrian WHERE status=2 " .$filter_waktu . $filter_jenis_antrian . $filter_counter ;
}else{
	$query = " SELECT COUNT(*) as id FROM data_antrian   WHERE status "   .$filter_waktu . $filter_jenis_antrian . $filter_counter;
}

$response = array();

$result = mysqli_query($conn, $query);
while( $row = mysqli_fetch_assoc($result) ){		
	
	if ($row['id']==NULL) {
       $id="0";               
	} else {
       $id=$row['id'];              
	}
	
	array_push($response, 
                array(
                    'count'=>$id
                    ) 
                );
			   
}
echo json_encode($id);   


?>