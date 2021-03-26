<?php
    //Prod
    $server = 'remotemysql.com';
    $username = 'TyZShYLZqQ';
    $password = 'hAd45jczoE';
    $dbName = 'TyZShYLZqQ';

    //Dev
    // $server = 'localhost';
    // $username = 'dev';
    // $password = 'Dev1234$';
    // $dbName = 'MarcellTanure_Portfolio';

    $dbLink = new mysqli($server, $username, $password, $dbName);

if($dbLink->connect_errno){
    printf("Unable to connect to database: %s", $dbLink->connect_error);
    exit();
}

if(!$dbLink){
    die("Connection failed: ".$dbLink->error());
}