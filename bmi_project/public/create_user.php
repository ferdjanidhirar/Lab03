<?php
$host = 'localhost';
$dbname = 'bmi_db';
$user = 'root';
$pass = '';
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$username = 'admin'; // غيّر الاسم حسب الرغبة
$password = password_hash('123456', PASSWORD_DEFAULT); // كلمة المرور مشفرة
$role = 'admin'; // أو 'user'

$stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
$stmt->execute([$username, $password, $role]);

echo "User created successfully!";
?>



