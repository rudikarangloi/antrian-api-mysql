<?php


if(isset($_POST['userName']) && isset($_POST['password'])){
	$userName  = $_POST['userName'];
	$password  = md5($_POST['password']);
	$full_name = $_POST['full_name'];
	$phone     = $_POST['phone'];
	
	require_once 'connect.php';
	$data = array();
	
	
	$sql="SELECT * FROM users WHERE username = '$userName' ";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0)	
	{
	
		$data['result'] = 'false';
    	$data['msg'] = 'Data telah digunakan';
    	
	}else{
		$sql = "INSERT INTO users SET username='$userName',password='$password',full_name= '$full_name',phone = '$phone'";	
		if(mysqli_query($conn,$sql)){
		
			$data['result'] = 'true';
        	$data['msg'] = 'Berhasil Insert Data';
        	
		}else{
			
			$data['result'] = 'true';
        	$data['msg'] = 'Gagal Insert Data';
        	
		}
	}
	

	
}else{

	$data['result'] = 'false';
	$data['msg'] = 'Data belum lengkap';
}

echo json_encode($data);


?>