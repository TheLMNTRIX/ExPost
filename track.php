<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "dbms_project";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $order_id = $_POST["order_id"];

  
    $sql = "SELECT *
            FROM order_details o
            JOIN customer_details c ON o.customer_id = c.customer_id
            JOIN item_details i ON o.item_id = i.item_id
            WHERE o.order_id = $order_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            echo "Order ID: " . $row["order_id"] . "<br>";
            echo "Customer Name: " . $row["customer_name"] . "<br>";
            echo "Customer Ph. No.: " . $row["customer_ph"] . "<br>";
            echo "Customer Address: " . $row["customer_address"] . "<br>";
            echo "Customer Email: " . $row["customer_email"] . "<br>";
            echo "Order Placed On: " . $row["place_date"] . "<br>";
            echo "Customer Ph. No.: " . $row["customer_ph"] . "<br>";
            echo "Item Weight: " . $row["weight"] . "<br>";
            echo "Pickup Location: " . $row["pickup_loc"] . "<br>";
            echo "Delivery Location: " . $row["deliver_loc"] . "<br>";
            echo "Pickup Pincode: " . $row["pickup_pincode"] . "<br>";
            echo "Delivery Pincode: " . $row["deliver_pincode"] . "<br>";
            echo "Deliver Phone Number: " . $row["deliver_ph"] . "<br>";
            echo "Estimated Time Of Arrival: " . $row["ETA"] . "<br>";
            echo "Current Location: " . $row["current_loc"] . "<br>";
            echo "delivery_status: " . $row["delivery_status"] . "<br>";
            echo "-----------------------------------------<br>";
        }
    } else {
        echo "Order ID not found.";
    }
}

$conn->close();
?>
