<?php

	/*
	$sIdc = $_POST['sIdc'];
	$sKey = $_POST['sKey'];
	$sCrt = $_POST['sCrt'];
	$sNom = $_POST['sNom'];	
	*/
	
	$sIdc = "4328";
	$sKey = "rsu41iman902";
	//$sCrt = 'ktp';
	//$sNom = '3172030901760002';	
	$sNom = '3172033112980004';
	//$sNom = $_POST['sNom'];	
	
	if(strlen($sNom)==16){
		$sCrt = 'ktp';
	}else{
		$sCrt = 'bpjs';
	}
	
	date_default_timezone_set('UTC');
	$tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
	$tdata = $sIdc."&".$tStamp;
	$signature = hash_hmac('sha256', $tdata, $sKey, true);
	$encodedSignature = base64_encode($signature);	
	
	if ($sCrt=='ktp'){
		$sNik="nik/";
	}
	else {
		$sNik="nokartu/";
	}
	
	$url = "https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/Peserta/";
	
	$url.= $sNik;     
	$url.= $sNom;
	$url.= "/tglSEP/2020-02-14";
		
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER,array("Accept: application/json\r\n" . "X-cons-id: ".$sIdc."\r\n" . "X-Timestamp: $tStamp\r\n" . "X-Signature: $encodedSignature"));
	curl_setopt($curl, CURLOPT_GET, true);
	$json_response = curl_exec($curl);
	$error_msg = curl_error($curl);
	curl_close($curl);
	
	$ArrData = json_decode($json_response, true);
	$ArrCode = $ArrData[metaData]['code']; 
	$ArrMess = $ArrData[metaData]['message']; 
	
	if($ArrCode=="200")
	{
		/*
		echo '<output>';
		
		echo '<P>'.$ArrCode.'</P>';
		echo '<P>'.$ArrMess.'</P>';
		echo '<P>'.$ArrData[response]['peserta']['noKartu'].'</P>';
		echo '<P>'.$ArrData[response]['peserta']['nik'].'</P>';
		echo '<P>'.$ArrData[response]['peserta']['nama'].'</P>';
		echo '<P>'.$ArrData[response]['peserta']['statusPeserta']['kode'].'</P>';
		echo '<P>'.$ArrData[response]['peserta']['statusPeserta']['keterangan'].'</P>';
		echo '<P>'.$ArrData[response]['peserta']['hakKelas']['kode'].'</P>';
		echo '<P>'.$ArrData[response]['peserta']['hakKelas']['keterangan'].'</P>';

		echo '<P>'.$ArrData[response]['peserta']['jenisPeserta']['kode'].'</P>';
		echo '<P>'.$ArrData[response]['peserta']['jenisPeserta']['keterangan'].'</P>';
		
		echo '<P>'.$ArrData[response]['peserta']['provUmum']['kdProvider'].'</P>';
		echo '<P>'.$ArrData[response]['peserta']['provUmum']['nmProvider'].'</P>';
		
		echo '<P>'.$ArrData[response]['peserta']['tglTMT'].'</P>';
		echo '<P>'.$ArrData[response]['peserta']['tglTAT'].'</P>';
		echo '<P>'.$ArrData[response]['peserta']['tglCetakKartu'].'</P>';
		echo '<P> '.$ArrData[response]['peserta']['mr']['noTelepon'].'</P>';
		echo '</output>';
		*/
		//echo $json_response;
		echo 'true';
		
		
	}
	else
	{		
		echo 'false';
	}

?>