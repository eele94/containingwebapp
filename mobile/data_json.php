<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("cpanel.eele.nl", "containi_view", "simulatie", "containi_db");

$result = $conn->query("SELECT * FROM statistieken");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"containers_buitenvaart":"'  . $rs["containers_buitenvaart"] . '",';
    $outp .= '"containers_binnenvaart":"'   . $rs["containers_binnenvaart"]        . '",';
	$outp .= '"containers_trein":"'. $rs["containers_trein"]     . '",';
    $outp .= '"actief_agvs":"'. $rs["actief_agvs"]     . '"}';
}
$outp .="]";

$conn->close();

echo($outp);
?>