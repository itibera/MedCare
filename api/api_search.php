<?php

include_once '../db.php';


$searchParam = $_GET['searchParam'];

$query = "SELECT 
        `medicine`.`med_id`,
        `medicine`.`name`,
        `medicine`.`company`,
        `medicine`.`quantity`,
        `medicine`.`price`,
        `medicine`.`images`
        FROM medicine
        WHERE `name` LIKE '%$searchParam%'
        OR `company` LIKE '%$searchParam%'
        OR `type` LIKE '%$searchParam%'
        OR `composition` LIKE '%$searchParam%'
        OR `uses` LIKE '%$searchParam%'
        OR `description` LIKE '%$searchParam%'";

$queryResult = $conn->query($query);

$searchItems = [];
if ($queryResult->num_rows > 0) {

    while ($row = $queryResult->fetch_assoc()) {
        $medID = $row["med_id"];
        $imageURL = 'med-image/' . $medID . '/' . $row["images"];
        $medName = $row['name'];
        $company = $row['company'];
        $price = $row['price'];
        $packQty = $row['quantity'];
       

        $item = array(
            "id" => $medID,
            "image" => $imageURL,
            "name" => $medName,
            "company" => $company,
            "price" => $price,
            "packQty" => $packQty,
            
        );

        array_push($searchItems, $item);
    }
    echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $searchItems));
} else {
    echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
}
