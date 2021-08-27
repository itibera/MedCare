<?php

include_once '../db.php';

if (isset($_POST['type'])) {
    $type = $_POST['type'];
} else {
    $type = $_GET['type'];
}

switch ($type) {
    case "post":
        $user_id = $_POST['email'];
        $med_id = $_POST['medID'];
        $qty = $_POST['qty'];

        $insert_values = "('" . $user_id . "','" . $med_id . "','" . $qty . "')";

        $query = "INSERT INTO cart VALUES $insert_values";

        $insertCart = $conn->query($query);
        if ($insertCart) {
            echo json_encode(array("statusCode" => 200, "msg" => "Success"));
        } else {
            echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
        }
        break;

    case "get":
        $user_id = $_GET['email'];

        $query = "SELECT 
        `medicine`.`med_id`,
        `medicine`.`name`,
        `medicine`.`company`,
        `medicine`.`quantity`,
        `medicine`.`price`,
        `medicine`.`images`,
        `cart`.`qty`
        FROM medicine, cart 
        WHERE `medicine`.`med_id`=`cart`.`med_id` 
        AND `cart`.`user_id`= '$user_id'";
        
        $queryResult = $conn->query($query);

        $cartItems = [];
        if ($queryResult->num_rows > 0) {

            while ($row = $queryResult->fetch_assoc()) {
                $medID = $row["med_id"];
                $imageURL = 'med-image/' . $medID . '/' . $row["images"];
                $medName = $row['name'];
                $company = $row['company'];
                $price = $row['price'];
                $packQty = $row['quantity'];
                $cartQty = $row['qty'];

                $item = array(
                    "id" => $medID,
                    "image" => $imageURL,
                    "name" => $medName,
                    "company" => $company,
                    "price" => $price,
                    "packQty" => $packQty,
                    "cartQty" => $cartQty
                );

                array_push($cartItems, $item);
            }
            echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $cartItems));
        } else {
            echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
        }
        break;

    default:
        //   code to be executed if n is different from all labels;
}
