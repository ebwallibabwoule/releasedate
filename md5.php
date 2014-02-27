<?php

    header('Content-Type: application/json');

    $auth = (isset($_REQUEST['auth']) ? $_REQUEST['auth'] : '');
    $search = (isset($_REQUEST['search']) ? $_REQUEST['search'] : '');

    $call = "http://api.rovicorp.com/search/v2.1/music/search?callback=?&entitytype=album&query=" . $search . "&rep=1&filter=releasedate&size=5&offset=0&language=en&country=US&format=json&apikey=dfqnz9ymrde5h2rdpxnpaqku&sig=" . $auth;
        
    $handle = fopen($call, "rb");
    $contents = stream_get_contents($handle);
    fclose($handle);
    echo $contents;

?>