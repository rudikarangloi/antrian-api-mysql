<?php

require "connect.php";
	
	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$response = array();
		$title = $_POST['title'];
		$content = $_POST['content'];
		$description = $_POST['description'];
		$id_users = $_POST['id_users'];

		 if($_FILES['image']['name'] == "") {
            $insert = "UPDATE tbl_news SET  title = '$title', content = '$content', description ='$description' WHERE id_news='$id_news'";
        }else{
            $image = date('dmYHis').str_replace(" ","", basename($_FILES['image']['name']));
		    $imagePath = "upload/".$image;
		    move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);
		    $insert = "UPDATE tbl_news SET image = '$image', title = '$title', content = '$content', description ='$description' WHERE id_news='$id_news'";
        }
		
		if (mysqli_query($connect, $insert)) {
				# code...
				$response['value']=1;
				$response['message']="Berhasil di tambahkan";
				echo json_encode($response);
		} else {
				# code...
				$response['value']=0;
				$response['message']="Gagal di ditambahkan";
				echo json_encode($response);
		}
		}
	
?> 