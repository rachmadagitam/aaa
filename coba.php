<?
$mysqli = new mysqli('localhost','root','','adminpt');
$myArray = array();

$result = $mysqli->query("SELECT provinsi FROM adminpt");

if (mysqli_num_rows($result) > 0) {
 
    $response["adminpt"] = array();

    while ($row = mysqli_fetch_array($result)) {
            // temp user array
            $item = array();
            $item["provinsi"] = $row["provinsi"];

            // push ordered items into response array
            array_push($response["orders"], $item);
           }
      // success
     $response["success"] = 1;
}
else {
    // order is empty
      $response["success"] = 0;
      $response["message"] = "No Items Found";
}
// echoing JSON response
echo json_encode($response);
