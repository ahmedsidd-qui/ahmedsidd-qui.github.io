<?php

if($_SERVER["REQUEST_METHOD"]  == "POST"){

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);


    $conn = new mysqli('localhost','root','','formresponse');

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("INSERT INTO form (name, email, subject, message) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }
    
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    
    if (!$stmt->execute()) {
        die('Error executing statement: ' . $conn->error);
    }
    
    echo "Form Submitted Successfully!";

    $stmt->close();
    $conn->close();
}
?>