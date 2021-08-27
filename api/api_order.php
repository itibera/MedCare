<?php

include_once '../db.php';

if (isset($_POST['type'])) {
    $type = $_POST['type'];
} else {
    $type = $_GET['type'];
}

switch ($type) {
    case "new_order":
        $user_id = $_POST['email'];
        $address = $_POST['address'];

        $query = "SELECT 
        `medicine`.`med_id`,
        `medicine`.`price`,
        `cart`.`qty`
        FROM medicine, cart 
        WHERE `medicine`.`med_id`=`cart`.`med_id` 
        AND `cart`.`user_id`= '$user_id'";

        $queryResult = $conn->query($query);


        if ($queryResult->num_rows > 0) {
            $total_price = 0;
            $order_id = 'ODR' . strtotime("now");
            $date = date('Y-m-d');
            // $medicines = [];

            $insertValuesSQL = '';
            while ($row = $queryResult->fetch_assoc()) {
                $medID = $row["med_id"];
                $price = $row['price'];
                $cartQty = $row['qty'];

                $total_price += ($price * $cartQty);
                // array_push($medicines, $medID);
                $insertValuesSQL .= "('" . $order_id . "','" . $medID . "','" . $cartQty . "'),";
            }
            if (!empty($insertValuesSQL)) {
                $insertValuesSQL = trim($insertValuesSQL, ',');
                $insert = $conn->query("INSERT INTO order_medicines VALUES $insertValuesSQL");

                $insertValuesSQL = "('" . $order_id . "','" . $user_id . "','" . $date . "','" . $total_price . "','" . $address . "','order_placed')";
                $insertOrder = $conn->query("INSERT INTO orders VALUES $insertValuesSQL");
                $deleteSQL = "DELETE FROM cart WHERE `cart`.`user_id`='$user_id'";
                $insertOrder = $conn->query($deleteSQL);
            }
            if ($insert AND $insertOrder) {
                echo json_encode(array("statusCode" => 200, "msg" => "Success"));
            } else {
                echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
            }
        } else {
            echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
        }
        break;

    case "get":
        $user_id = $_GET['email'];

        $query = "SELECT 
        `orders`.`order_id`,
        `orders`.`order_date`,
        `orders`.`total_price`,
        `orders`.`delivery_address`,
        `orders`.`delivery_status`
        FROM orders
        WHERE `orders`.`user_id`='$user_id'
        ORDER BY `orders`.`order_date` DESC";

        // echo $query;
        $queryResult = $conn->query($query);

        $orders = [];
        if ($queryResult->num_rows > 0) {

            while ($row = $queryResult->fetch_assoc()) {
                $order_id = $row["order_id"];
                $order_date = $row["order_date"];
                $total_price = $row["total_price"];
                $delivery_address = $row["delivery_address"];
                $delivery_status = $row["delivery_status"];

                $subQuery = "SELECT 
                `medicine`.`med_id`,
                `medicine`.`name`,
                `medicine`.`company`,
                `medicine`.`quantity`,
                `medicine`.`price`,
                `medicine`.`images`,
                `order_medicines`.`qty`
                FROM medicine, order_medicines 
                WHERE `medicine`.`med_id`=`order_medicines`.`med_id`
                AND `order_medicines`.`order_id`='$order_id'";

                $medicines = [];
                $subQueryResult = $conn->query($subQuery);
                
                while($subrow = $subQueryResult->fetch_assoc()) {
                    $medID = $subrow["med_id"];
                    $imageURL = 'med-image/' . $medID . '/' . $subrow["images"];
                    $medName = $subrow['name'];
                    $company = $subrow['company'];
                    $price = $subrow['price'];
                    $packQty = $subrow['quantity'];
                    $ordQty = $subrow['qty'];

                    $medicine = array(
                        "id" => $medID,
                        "image" => $imageURL,
                        "name" => $medName,
                        "company" => $company,
                        "price" => $price,
                        "packQty" => $packQty,
                        "ordQty" => $ordQty
                    );
    
                    array_push($medicines, $medicine);
                }
                
                $order = array(
                    "id"=>$order_id,
                    "date"=>$order_date,
                    "amount"=>$total_price,
                    "address"=>$delivery_address,
                    "status"=>$delivery_status,
                    "items"=>$medicines
                );

                array_push($orders, $order); 
            }
            echo json_encode(array("statusCode" => 200, "msg" => "Success", "data" => $orders));
        } else {
            echo json_encode(array("statusCode" => 201, "msg" => "No Data Found"));
        }
        break;

    default:
        //   code to be executed if n is different from all labels;
}
