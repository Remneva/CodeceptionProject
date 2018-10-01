<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=mytab', 'root', '123456'); //10.31.82.51
    foreach($dbh->query('SELECT * from test1') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>