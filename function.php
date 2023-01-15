<?php

require 'database/koneksi.php';

$long = htmlspecialchars($_POST["long_url"]);
$short = htmlspecialchars($_POST["short_url"]);

// query insert data
$query = "INSERT INTO link VALUES('', '$short', '$long')";
$result = mysqli_query($conn, $query);

if(!$result){
    echo $short;
}

