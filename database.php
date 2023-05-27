<?php
$host = 'localhost';
$username = 'postgres';
$password = 'marsay99';
$port = '5432';
$db_name = "TugasAkhir";

try {
    $conn = new PDO("pgsql:dbname=$db_name;host=$host", $username, $password);
    print "Connection established";
} catch (PDOException $e) {
    echo "Error connecting to database" . $e->getMessage();
}
