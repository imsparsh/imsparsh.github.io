<?php
// Open log file
$logfile = "../logfile.txt";

if (file_exists($logfile)) {

$handle = fopen($logfile, "r");
$log = fread($handle, filesize($logfile));
fclose($handle);
} else {
//die (“The log file doesn’t exist!”);
}
// Seperate each logline
$log = explode("\n", trim($log));
$log = array_reverse($log);

// Seperate each part in each logline
for ($i = 0; $i < count($log); $i++) {
$log[$i] = trim($log[$i]);
$log[$i] = explode('|', $log[$i]);
}
?>
<body style="background:black;color:white;font-family:Gothic, cursive;">
<h1 align="center"> Imsparsh Web Visits <pre>[<?php echo count($log); ?>]</pre></h1><br>
<?php
// Show a table of the logfile
echo '<table border=2 cellpadding=10 style="width:100%">';
echo '<th>IP Address</th>';
echo '<th>Date</th>';
echo '<th>Useragent</th>';
echo '<th>Remote Host</th>';
echo '<th>Page</th>';

foreach ($log as $logline) {
echo '<tr>';

echo '<td>' . $logline[0] . '</td>';
echo '<td>' . $logline[1] . '</td>';
echo '<td>' . $logline[2] . '</td>';
echo '<td>' . $logline[3] . '</td>';
echo '<td>' . $logline[4] . '</td>';

echo '</tr>';

}

echo '</table>';
?>