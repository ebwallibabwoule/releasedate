<?php
// Set your return content type
header('Content-type: text/html; charset=utf-8');

$chunck = 4096;

$q = ucwords($_GET['url']); // or $REQUEST would suffice?
$l = ucwords($_GET['limit']);
// then get website's content

$handle = fopen(str_replace(" ","+",$q), "r");

$limited = isset($l) && is_numeric($l);

// If there is something, read and return
if ($handle) {
	$loops = 0;
	$size = $chunck;
    while (($limited && ($l > $size)) || feof($handle)) {
    	$loops = $loops + 1;
    	$size = $loops * $chunck;

        $buffer = fgets($handle, $chunck);
        echo $buffer;
    }
    fclose($handle);
}
else { echo '<span class="oeps">No handle</span> for ' . $q; }
?>

