<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $myfile = fopen("data.json", "w") or die("Unable to open file!");
    fwrite($myfile, $_POST['data']);
    fclose($myfile);
    echo "created";
}

?>