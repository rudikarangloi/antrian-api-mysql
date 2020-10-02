<?php
	//$sNom = '3172033112980004';	
	$sNom = $_POST['sNom'];	
	//$bb = "http://localhost/cekBPJS/getBpjsData.php?sNom=".$sNom;
	header("Location: http://localhost/cekBPJS/getBpjsData.php?sNom=".$sNom);
	die();
	//echo $bb.' OK'; //localhost:90/api/RedirectGetBpjsData.php

?>