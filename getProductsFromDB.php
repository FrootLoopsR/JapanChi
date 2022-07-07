<?php
$servername = "37.59.55.185";
$username = "BvpmECk0AP";
$password = "9SVFB8U38d";
$dbname = "BvpmECk0AP";

$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM Products";


$result = $con->query($sql);

$jsonData = "[";

foreach ($result as $row) {
    $jsonData .= "{\"id\": \"" . $row['id'] . "\",\"productCategory\": \"" . $row['productCategory'] . "\",\"productName\":\"" . $row['productName'] . "\",\"productCost\":\"" . $row['productCost'] . "\",\"productImage\":\"" . $row['productImage'] . "\",\"productDescription\":\"" . $row['productDescription'] . "\",\"dateCreated\":\"" . $row['dateCreated'] . "\"},";
};
$jsonData = substr_replace($jsonData, "]", -1);

echo json_encode($jsonData);