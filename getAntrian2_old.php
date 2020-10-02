<?php 

require_once 'connect.php';

if(isset($_GET['item_type'])){
	$type = $_GET['item_type'];
}else{
	$type = "MIX";
}

$model_antrian = 0;
$filter_waktu = " AND DATE(waktu) = CURDATE() ";

if($type=="MAX"){	
	$query = " SELECT max(nomor) as id FROM data_antrian WHERE status=2 ".$filter_waktu ;
}else{
	$query = " SELECT COUNT(*) as id FROM data_antrian WHERE status ".$filter_waktu ;
}

$response = array();

$result = mysqli_query($conn, $query);
while( $row = mysqli_fetch_assoc($result) ){		
	
	if ($row['id']==NULL) {
       $id=0;               
	} else {
       $id=$row['id'];              
	}
	
   $id = str_replace('"'," ",$id);
			   
}
echo json_encode($id);   


?>