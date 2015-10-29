<?php
require("phpsqlsearch_dbinfo.php");

// Get parameters from URL
$center_lat = $_GET["LATITUDE"];
$center_lng = $_GET["LONGITUDE"];
$radius = $_GET["radius"];

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("STREET");
$parnode = $dom->appendChild($node);

// Opens a connection to a mySQL server
$connection=mysql_connect (localhost, $username, $password);
if (!$connection) {
  die("Not connected : " . mysql_error());
}

// Set the active mySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ("Can\'t use db : " . mysql_error());
}

// Search the rows in the STREET table
$query = sprintf("SELECT STREET_NAME, LATITUDE, LONGITUDE, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM STREET HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  mysql_real_escape_string($center_lat),
  mysql_real_escape_string($center_lng),
  mysql_real_escape_string($center_lat),
  mysql_real_escape_string($radius));
$result = mysql_query($query);

$result = mysql_query($query);
if (!$result) {
  die("Invalid query: " . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  $node = $dom->createElement("street");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("STREET_NAME", $row['STREET_NAME']);
  $newnode->setAttribute("LATITUDE", $row['LATITUDE']);
  $newnode->setAttribute("LONGITUDE", $row['LONGITUDE']);
  $newnode->setAttribute("distance", $row['distance']);
}

echo $dom->saveXML();
?>
