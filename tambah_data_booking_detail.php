<?php
	
	require_once 'connect.php';	
	
    $nik 				= $_POST['nik'];
	$no_rm          	= $_POST['no_rm'];
	$nama  				= $_POST['nama'];
	$alamat  			= $_POST['alamat'];
	$alamatKtp  		= $_POST['alamatKtp'];
	$alamatKota    		= $_POST['alamatKota'];	
	$tempatlahir 		= $_POST['tempatlahir'];
	$tanggallahir   	= $_POST['tanggallahir'];
	$jenispasien  		= $_POST['jenispasien'];
	$antrianDate  		= $_POST['antrianDate'];
	$antrianNo  		= $_POST['antrianNo'];
	$antrianNoBooking  	= $_POST['antrianNoBooking'];
	$PoliklinikName    	= $_POST['PoliklinikName'];	
	$PoliklinikNo 		= $_POST['PoliklinikNo'];
	$kodeBooking        = $_POST['kodeBooking'];
	$jenisantrianpoliklinik = $_POST['jenisantrianpoliklinik'];
	$qr  				= $_POST['qr'];
	$kodePerusahaan		= $_POST['kodePerusahaan'];
	$namaPerusahaan	    = $_POST['namaPerusahaan'];	
	$kodeBPJS 			= $_POST['kodeBPJS'];
	$namaPesertaBPJS	= $_POST['namaPesertaBPJS'];
	$statusPesertaBPJS	= $_POST['statusPesertaBPJS'];
	$kelasPesertaBPJS 	= $_POST['kelasPesertaBPJS'];
	$jenisPesertaBPJS 	= $_POST['jenisPesertaBPJS'];
	$telpPesertaBPJS  	= $_POST['telpPesertaBPJS'];	
	$noKartuPesertaBPJS = $_POST['noKartuPesertaBPJS'];
	$nikPesertaBPJS    	= $_POST['nikPesertaBPJS'];
	
	
	$query = " SELECT count(*) as count FROM data_antrian_detail WHERE nik='". $nik."'";	
    $result = mysqli_query($conn, $query);
    $response = array();
    while( $row = mysqli_fetch_assoc($result) ){				
		if($row['count']>0){
			$operation = "update" ;
		}else{
			$operation = "insert" ;
		}		   
    }
	
	if($operation == "update"){		
	    /*
		$sql = "UPDATE data_antrian_detail SET 
					nik 				= '$nik',
					no_rm          	    = '$no_rm',
					nama  				= '$nama',
					alamat  			= '$alamat',
					alamatKtp  		    = '$alamatKtp',
					alamatKota    		= '$alamatKota',	
					tempatlahir 		= '$tempatlahir',
					tanggallahir   	    = '$tanggallahir',
					jenispasien  		= '$jenispasien',
					antrianDate  		= '$antrianDate',
					antrianNo  		    = '$antrianNo',
					antrianNoBooking  	= '$antrianNoBooking',
					PoliklinikName    	= '$PoliklinikName',	
					PoliklinikNo 		= '$PoliklinikNo',
					kodeBooking         = '$kodeBooking',
					jenisantrianpoliklinik = '$jenisantrianpoliklinik',
					qr  				= '$qr',
					kodePerusahaan		= '$kodePerusahaan',
					namaPerusahaan	    = '$namaPerusahaan',	
					kodeBPJS 			= '$kodeBPJS',
					namaPesertaBPJS	    = '$namaPesertaBPJS',
					statusPesertaBPJS	= '$statusPesertaBPJS',
					kelasPesertaBPJS 	= '$kelasPesertaBPJS',
					jenisPesertaBPJS 	= '$jenisPesertaBPJS',
					telpPesertaBPJS  	= '$telpPesertaBPJS',	
					noKartuPesertaBPJS  = '$noKartuPesertaBPJS',
					nikPesertaBPJS    	= '$nikPesertaBPJS'	
				WHERE nik = '$nik'
				";
		*/
		$sql = "INSERT INTO data_antrian_detail SET 
				nik 				= '$nik',
				no_rm          	    = '$no_rm',
				nama  				= '$nama',
				alamat  			= '$alamat',
				alamatKtp  		    = '$alamatKtp',
				alamatKota    		= '$alamatKota',	
				tempatlahir 		= '$tempatlahir',
				tanggallahir   	    = '$tanggallahir',
				jenispasien  		= '$jenispasien',
				antrianDate  		= '$antrianDate',
				antrianNo  		    = '$antrianNo',
				antrianNoBooking  	= '$antrianNoBooking',
				PoliklinikName    	= '$PoliklinikName',	
				PoliklinikNo 		= '$PoliklinikNo',
				kodeBooking         = '$kodeBooking',
				jenisantrianpoliklinik = '$jenisantrianpoliklinik',
				qr  				= '$qr',
				kodePerusahaan		= '$kodePerusahaan',
				namaPerusahaan	    = '$namaPerusahaan',	
				kodeBPJS 			= '$kodeBPJS',
				namaPesertaBPJS	    = '$namaPesertaBPJS',
				statusPesertaBPJS	= '$statusPesertaBPJS',
				kelasPesertaBPJS 	= '$kelasPesertaBPJS',
				jenisPesertaBPJS 	= '$jenisPesertaBPJS',
				telpPesertaBPJS  	= '$telpPesertaBPJS',	
				noKartuPesertaBPJS  = '$noKartuPesertaBPJS',
				nikPesertaBPJS    	= '$nikPesertaBPJS'				
				";	
	}else{
		
		$sql = "INSERT INTO data_antrian_detail SET 
				nik 				= '$nik',
				no_rm          	    = '$no_rm',
				nama  				= '$nama',
				alamat  			= '$alamat',
				alamatKtp  		    = '$alamatKtp',
				alamatKota    		= '$alamatKota',	
				tempatlahir 		= '$tempatlahir',
				tanggallahir   	    = '$tanggallahir',
				jenispasien  		= '$jenispasien',
				antrianDate  		= '$antrianDate',
				antrianNo  		    = '$antrianNo',
				antrianNoBooking  	= '$antrianNoBooking',
				PoliklinikName    	= '$PoliklinikName',	
				PoliklinikNo 		= '$PoliklinikNo',
				kodeBooking         = '$kodeBooking',
				jenisantrianpoliklinik = '$jenisantrianpoliklinik',
				qr  				= '$qr',
				kodePerusahaan		= '$kodePerusahaan',
				namaPerusahaan	    = '$namaPerusahaan',	
				kodeBPJS 			= '$kodeBPJS',
				namaPesertaBPJS	    = '$namaPesertaBPJS',
				statusPesertaBPJS	= '$statusPesertaBPJS',
				kelasPesertaBPJS 	= '$kelasPesertaBPJS',
				jenisPesertaBPJS 	= '$jenisPesertaBPJS',
				telpPesertaBPJS  	= '$telpPesertaBPJS',	
				noKartuPesertaBPJS  = '$noKartuPesertaBPJS',
				nikPesertaBPJS    	= '$nikPesertaBPJS'				
				";	
		
	}
	
	if(mysqli_query($conn,$sql)){			
		echo "success";
	}else{
		echo "failed";;	
	}
	
	
	
		
	




?>