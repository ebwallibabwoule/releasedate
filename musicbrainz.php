<?php

    header('Content-Type: application/json');

    $search = (isset($_REQUEST['search']) ? $_REQUEST['search'] : '');

    $call = "http://musicbrainz.org/ws/2/release/?query=release:" . $search;

    $handle = fopen($call, "rb");
    $contents = stream_get_contents($handle);
    fclose($handle);

    $xml = simplexml_load_string($contents);
    $json = json_encode($xml);
    //$array = json_decode($json,TRUE);

    echo $json;

?>