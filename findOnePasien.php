<?php
require "connfile.php";
require "functionfile.php";
require "insertupdate.php";


$FS_KD_IDENTITAS = $_POST['FS_KD_IDENTITAS'];

$FS_NM_PASIEN = fGlobal("FS_NM_PASIEN","TC_MR","FS_KD_IDENTITAS","$FS_KD_IDENTITAS","=","",DatabaseSA,$ConSA,"");

echo $FS_NM_PASIEN;





?>