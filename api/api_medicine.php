<?php

include_once '../db.php';
$medID = $_GET['medID'];

$medicineQuery = "SELECT *
    FROM medicine
    WHERE `medicine`.`med_id`='$medID'";
$medicineQueryResult = $conn->query($medicineQuery);

if ($medicineQueryResult->num_rows > 0) {
	$row = $medicineQueryResult->fetch_assoc();

	$medID = $row["med_id"];
	$imageURL = 'med-image/' . $medID . '/' . $row["images"];
	$medName = $row['name'];
	$company = $row['company'];
	$type = $row['type'];
	$category = $row['category'];
	$composition = $row['composition'];
	$uses = $row['uses'];
	$price = $row['price'];
	$sideEffects = $row['side_effects'];
	$description = $row['description'];

	$data = array(
		'medID' => $medID,
		'imageURL' => $imageURL,
		'medName' => $medName,
		'company' => $company,
		'type' => $type,
		'category' => $category,
		'composition' => $composition,
		'uses' => $uses,
		'price' => $price,
		'sideEffects' => $sideEffects,
		'description' => $description
	);

	echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $data));
} else {
	echo json_encode(array("statusCode" => 201, "msg" => "Failed"));
}
