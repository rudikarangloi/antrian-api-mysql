<?php 

require_once 'connect.php';


if(isset($_GET['item_type'])){
	$type = $_GET['item_type'];
}
if(isset($_GET['client'])){
	$client = $_GET['client'];
}

	$query = "SELECT * FROM client_antrian ORDER BY id";
            $result = mysqli_query($conn, $query);
            $response = array();
            while( $row = mysqli_fetch_assoc($result) ){
                array_push($response, 
                array(
                    'client'=>$row['client'], 
					'description'=>$row['description'], 
					'kode_layanan'=>$row['kode_layanan']
                    ) 
                );
            }
            echo json_encode($response);   

mysqli_close($conn);

?>