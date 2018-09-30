<?php

try {
$dbh = new PDO('mysql:host=10.31.82.51;dbname=mytab', 'root', '123456');
foreach($dbh->query('SELECT * from test1') as $row) {
print_r($row);
}
$dbh = null;
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>