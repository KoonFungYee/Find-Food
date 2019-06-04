<?php
error_reporting(0);
include_once("dbconnect.php");
$search = $_POST['search'];

$sql = "SELECT * FROM ".$search;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $response["result"] = array();
    while ($row = $result ->fetch_assoc()){
        $resultlist = array();
        $resultlist[foodname] = $row["foodname"];
        $resultlist[price] = $row["price"];
        $resultlist[restname] = $row["restname"];
        $resultlist[state] = $row["state"];
        array_push($response["result"], $resultlist);
    }
    echo json_encode($response);
}else{
    echo "nodata";
}
?>