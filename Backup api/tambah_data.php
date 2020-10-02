<?php

//if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	
	require_once 'connect.php';
	
    $loket  = $_POST['loket'];
	$jenis_antrian_poliklinik   = $_POST['passData'];
	$nomorkartubpjs  			= $_POST['nomorkartubpjs'];
	$nik  						= $_POST['nik'];
	$nomortelp  				= $_POST['nomortelp'];
	
	$model_antrian = 0;
	$filter_waktu = " AND DATE(waktu) = CURDATE() ";
		
	if($jenis_antrian_poliklinik == "0"){				
		$filter_jenis_antrian = " AND jenis_antrian_poliklinik = '0' ";
		$query = " SELECT count(*) as count FROM data_antrian WHERE id ". $filter_waktu . $filter_jenis_antrian ;
		$nomorkartubpjs = "";
		$nik = "";
		$nomortelp = "";
	}else{				
		$filter_jenis_antrian = " AND jenis_antrian_poliklinik <> '0' ";
		$query = " SELECT count(*) as count FROM data_antrian WHERE counter='". $loket."' ". $filter_waktu . $filter_jenis_antrian;		
	}
	
    $result = mysqli_query($conn, $query);
    $response = array();
    while( $row = mysqli_fetch_assoc($result) ){		
				
		if($row['count']>0){
			$jmlCountId = (int)$row['count'] + 1 ;
		}else{
			$jmlCountId = 1;
		}		
		   
    }
	
	$waktu      = date("Y-m-d H:i:s");
	$status     = '3';
	$input_from = 'hp';
	
	// Cek Kuota dan Jumlah pasien
	$query = " SELECT kuota_hp FROM client_antrian WHERE client = $loket " ;
    $result = mysqli_query($conn, $query);
    $response = array();
    while( $row = mysqli_fetch_assoc($result) ){				
		$jmlKouta= $row['kuota_hp']  ;				   
    }
	
	$query = " SELECT count(*) as count FROM data_antrian WHERE id ". $filter_waktu . " AND counter = '$loket' AND input_from = '$input_from'";
    $result = mysqli_query($conn, $query);
    $response = array();
    while( $row = mysqli_fetch_assoc($result) ){		
		$jmlPasien = $row['count']  ;			   
    }
	
	//End  Cek Kuota dan Jumlah pasien
	
		
	if($jmlPasien >= $jmlKouta) {
		echo "Pendaftaran sudah melebihi kuota";		
	}else{
		
		/*
		nomorkartubpjs
		nik
		nomortelp
		
		nomorreferensi : No Rujukan/Kontrol [Tidak ada saat antrian umum non poli]	[Kosongkan]	
		jenisreferensi : Rujukan/kontrol [Kosongkan]		
		jenisantrian   : [Kosongkan] [tidak tahu tujuannya]
		jenispoli      : [Kosongkan] [1:Eksekutif / 0:Reguler]
		
		kodebooking    : Kode Acak
		jenis_antrian_poliklinik : 0:Belom tedaftar / 1:Sudah Terdaftar
		*/
		
		$KodeBookings = KodeBooking();
		
		$sql = "INSERT INTO data_antrian SET 
	            counter        = '$loket',
	            waktu          = '$waktu',
	            status         = '$status',
				input_from     = '$input_from',
				nomor          = '$jmlCountId',
				nomorkartubpjs = '$nomorkartubpjs',
				nik            = '$nik',
				nomortelp      = '$nomortelp',
				kodebooking    = '$kodebookings',
				jenis_antrian_poliklinik = '$jenis_antrian_poliklinik'
				";
	
		if(mysqli_query($conn,$sql)){
			echo $jmlCountId;;
		}else{
			echo "Gagal Insert Data";	
		}
	
	}
	
	function getTotalRow($sql)
	{
		//$rs = mysql_query($sql) or die(mysql_error().$sql);
		//$r = mysql_num_rows($rs);
		//mysql_free_result($rs);

		include "connect.php";		
		
		//$rstClient = $mysqli->query($sql);
		$rstClient = mysqli_query($conn,$sql);		
		$rowClient = $rstClient->fetch_array();
		if($rowClient['count']>0){
			$jmlClient = $rowClient['count'];
		}else{
			$jmlClient = 0;
		}
	  
		return $jmlClient;
	}
	
	function KodeBooking()
	{
		//jumlah panjang karakter angka dan huruf.
		
		$length_abjad = "2";
		$length_angka = "4";

		//huruf yg dimasukan, kecuali I,L dan O
		$huruf = "ABCDEFGHJKMNPRSTUVWXYZ";

		//mulai proses generate huruf
		$i = 1;
		$txt_abjad = "";
		while ($i <= $length_abjad) {
			$txt_abjad .= $huruf{mt_rand(0,strlen($huruf))};
			$i++;
		}

		//mulai proses generate angka
		$datejam = date("His");
		$time_md5 = rand(time(), $datejam);
		$cut = substr($time_md5, 0, $length_angka);	

		//mennggabungkan dan mengacak hasil generate huruf dan angka
		$acak = str_shuffle($txt_abjad.$cut);

		//menghitung dan memeriksa hasil generate di database menggunakan fungsi getTotalRow(),
		//jika hasil generate sudah ada di database maka proses generate akan diulang

		
		$cek  = getTotalRow("SELECT count(*) as count FROM data_antrian WHERE kodebooking = '".$acak."'");
		if($cek > 0) { $cek = KodeBooking(); }

		/*
		$cek = 0;
		$rstClient = $mysqli->query("SELECT count(*) as count FROM data_antrian WHERE kodebooking = '".$acak."'");		
		$rowClient = $rstClient->fetch_array();
		if($rowClient['count']>0){
			$jmlClient = $rowClient['count'];
		}else{
			$jmlClient = 0;
		}
		if($jmlClient > 0) { $cek = KodeBooking(); }
		*/

		return $acak;
	}
	
	
//}



?>