<?php

include_once '../db.php';

$type = $_POST['type'];

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
        $user_id =$_GET['email'];
        $query = "SELECT 
        `medicine`.`med_id`,
        `name`,
        `company`,
        `medicine`.`quantity`,
        `price`,
        `images`,
        `cart`.`qty`
        FROM medicine,cart 
        WHERE `medicine`.`med_id`=`cart`.`med_id` 
        AND `cart`.`user_id`= 'itibera5@gmail.com';";
        $queryResult = $conn->query($query);

        $cartItems = [];
        if ($queryCompleted->num_rows > 0) {

            while ($row = $queryCompleted->fetch_assoc()) {
                $packageID = $row["package_id"];
                $imageURL = 'package-image/' . $packageID . '/' . $row["cover_photo"];
                $packageName = $row["name"];
                $pickup = $row["pickup"];
                $dropoff = $row["dropoff"];
                $duration = $row["duration"];
                $price = $row["price"];
                $date = $row["date"];

                $tour = array(
                    "id" => $packageID,
                    "photo" => $imageURL,
                    "name" => $packageName,
                    "duration" => $duration,
                    "pickup" => $pickup,
                    "dropoff" => $dropoff,
                    "date" => $date
                );

                array_push($completedTours, $tour);
            }
            echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $completedTours));
        } else {
            echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
        }
        break;



    default:
        //   code to be executed if n is different from all labels;
}
