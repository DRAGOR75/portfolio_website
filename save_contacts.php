<?php

$host = 'localhost';
$dbname = 'contacts'; 
$username = 'root'; 
$password = 'W7301@jqir#'; 

try {
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (:name, :email, :phone, :message)");

    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);

    
    $stmt->execute();

    
    header("Location: thank_you.html");
    exit;
} catch(PDOException $e) {
    
    echo "Connection failed: " . $e->getMessage();
}
?>
