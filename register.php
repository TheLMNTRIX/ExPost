
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
    
    $user_name = $_POST["username1"];
    $pass_word = $_POST["password1"];
    $user_email = $_POST["user_email"];

    // Hash the password
    // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // SQL query to insert user details into the login_details table
    $sql = "INSERT INTO login_details (username, password, user_email) VALUES ('$user_name', '$pass_word', '$user_email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        // You can redirect the user to a different page or perform other actions after successful registration
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
