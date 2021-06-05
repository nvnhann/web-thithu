<?php
$servername = 'us-cdbr-east-03.cleardb.com';
$username = 'b1e6e96208af97';
$password = '0a4832ec';
$dbname = 'heroku_65185c86ef41e4b';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname)
    or die($conn->connect_error);

$conn->set_charset('utf8');
