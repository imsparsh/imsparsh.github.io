<?php
// Getting the information
date_default_timezone_set("Asia/Calcutta"); 

$ipaddress = $_SERVER['REMOTE_ADDR'];
$page = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF'];
if(!empty($_SERVER['QUERY_STRING']))
{
		$page .= $_SERVER['QUERY_STRING'];
}
$datetime = date("H:i:s M-d-Y", mktime( date("H") ,  date("i"), date("s"), date("n"), date("j"), date("Y")));
$useragent = $_SERVER['HTTP_USER_AGENT'];
$remotehost = @getHostByAddr($ipaddress);
// Create log line
$logline = $ipaddress . '|' . $datetime . '|' . $useragent . '|' . $remotehost . '|' . $page . "\n";

// Write to log file:
$logfile = "./logfile.txt";

// Open the log file in “Append” mode
if (!$handle = fopen($logfile, 'a+')) {
die("Failed to open log file");
}

// Write $logline to our logfile.
if (fwrite($handle, $logline) === FALSE) {
die('Failed to write to log file');
}

fclose($handle);
?>