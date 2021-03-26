<?php
    $server = 'localhost';
    $username = 'dev';
    $password = 'Dev1234$';
    $dbName = 'MarcellTanure_Portfolio';

    $dbLink = new mysqli($server, $username, $password, $dbName);

if($dbLink->connect_errno){
    printf("Unable to connect to database: %s", $dbLink->connect_error);
    exit();
}

if(!$dbLink){
    die("Connection failed: ".$dbLink->error());
}

$sql = 'SELECT authorId, firstName, lastName FROM authors WHERE authorId > 0';
$result = $dbLink->query($sql);

while($row = $result->fetch_assoc()){
    echo "ID: ".$row['authorId']." ".$row['firstName']." ".$row['lastName']."<br>";
}

$result->close();
//close connection
$dbLink->close();
?>