<?php

require_once("Database.php");

$db = new Database();
echo $db->dbConnected() ? "DB Connected" . PHP_EOL : "DB not connected" . PHP_EOL;

// Verify db connection
if($db->dbConnected()) {
    echo $db->getError();
    die('Unable to connect to DB');
}

// Execute querys
$db->query("SELECT * FROM tbl_oop_test");
var_dump($db->resultSet());
echo "Rows: " . $db->rowCount();
var_dump($db->single());

// Execute querys
$db->query("SELECT * FROM tbl_oop_test WHERE id = :id");
$db->bind(':id', 3);
var_dump($db->single());


?>